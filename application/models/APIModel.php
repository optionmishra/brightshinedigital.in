<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class APIModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getAllSeries()
  {
    $res = $this->db
      ->get('series')
      ->result();
    return $res;
  }

  public function getSubjectsBySeriesId($seriesId)
  {
    $res = $this->db
      ->select('ms.id, ms.name')
      ->from('series_main_subjects sms')
      ->join('main_subject ms', 'ms.id = sms.main_subject_id')
      ->where('sms.series_id', $seriesId)
      ->get()
      ->result();
    return $res;
  }

  public function getAllClasses()
  {
    $res = $this->db
      ->select('id, name')
      ->order_by('class_position', 'ASC')
      ->get('classes')
      ->result();
    return $res;
  }

  public function getFilteredBooks($seriesId = null, $subjectIdsArr = null, $classIdsArr = null)
  {
    // echo var_dump($subjectIdsArr);
    // exit;
    $this->db->select('subject.id, subject.sid as subjectId, subject.class as classId, subject.name as title');
    if ($seriesId) $this->db->where('series_id', $seriesId);
    if ($subjectIdsArr) $this->db->or_where_in('series_id', $subjectIdsArr);
    if ($classIdsArr) $this->db->or_where_in('series_id', $classIdsArr);
    $res = $this->db->get('subject')->result();
    return $res;
  }

  public function saveUserBooks($bookIdsArr, $selectedSeriesId)
  {
    $userId = $this->session->userdata('user_id');

    // Make sure user ID exists
    if (!$userId) {
      return false;
    }

    // Begin transaction for atomicity
    $this->db->trans_begin();

    try {
      // Delete existing records in a single query
      $tables = ['web_user_books', 'web_user_series', 'web_user_subjects'];
      foreach ($tables as $table) {
        $this->db->where('web_user_id', $userId);
        $this->db->delete($table);
      }

      // Early return if no books to insert
      if (empty($bookIdsArr)) {
        $this->db->trans_commit();
        return true;
      }

      // Build books data array for insertion
      $booksData = [];
      foreach ($bookIdsArr as $bookId) {
        $booksData[] = [
          'web_user_id' => $userId,
          'book_id' => $bookId,
        ];
      }

      // Insert book data if we have any
      if (!empty($booksData)) {
        $this->db->insert_batch('web_user_books', $booksData);
      }

      // Get subject IDs from the books
      $books = $this->db
        ->select('sid')
        ->where_in('id', $bookIdsArr)
        ->get('subject')
        ->result();

      // Build subject data array for insertion
      $subjectData = [];
      $subjectIdsArr = array_unique(array_map(function ($book) {
        return $book->sid;
      }, $books));

      foreach ($subjectIdsArr as $main_subject_id) {
        $subjectData[] = [
          'web_user_id' => $userId,
          'main_subject_id' => $main_subject_id,
        ];
      }

      // Insert subject data if we have any
      if (!empty($subjectData)) {
        $this->db->insert_batch('web_user_subjects', $subjectData);
      }

      // Insert series data if we have a series ID
      if (!empty($selectedSeriesId)) {
        $seriesData = [
          'web_user_id' => $userId,
          'series_id' => $selectedSeriesId,
        ];
        $this->db->insert('web_user_series', $seriesData);
      }

      // Commit the transaction
      $this->db->trans_commit();
      return true;
    } catch (Exception $e) {
      // Rollback in case of error
      $this->db->trans_rollback();
      return false;
    }
  }
}
