<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class APIController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('APIModel');
    $this->load->model('AuthModel');
    $this->load->helper('url');
  }

  private function sendAPIResponse($data)
  {
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($data));
  }

  public function getAllSeries()
  {
    $data = $this->APIModel->getAllSeries();
    return $this->sendAPIResponse($data);
  }


  public function getSubjectsBooks()
  {
    $seriesId = $this->input->get('series');
    $subjects = $this->APIModel->getSubjectsBySeriesId($seriesId);
    $subjectIdsArr = array_map(fn($subject) => $subject->id, $subjects);
    $data = [
      'subjects' => $subjects,
      'books' => $this->APIModel->getFilteredBooks($seriesId, $subjectIdsArr),
    ];
    return $this->sendAPIResponse($data);
  }

  public function getAllClasses()
  {
    $data = $this->APIModel->getAllClasses();
    return $this->sendAPIResponse($data);
  }

  public function getBooks()
  {
    $seriesId = $this->input->get('series');
    $subjectIds = $this->input->get('subjects');
    $data = $this->APIModel->getFilteredBooks($seriesId, $subjectIds);
    return $this->sendAPIResponse($data);
  }

  public function initBookSelection()
  {
    $allSeries = $this->APIModel->getAllSeries();
    $allSubjects = $this->APIModel->getAllSubjects();
    // $seriesId = $allSeries[0]->id;
    // $subjects = $this->APIModel->getSubjectsBySeriesId($seriesId);
    // $subjectIdsArr = array_map(fn($subject) => $subject->id, $subjects);
    $data = [
      'series' => $allSeries,
      // 'subjects' => $subjects,
      'subjects' => $allSubjects,
      'classes' => $this->APIModel->getAllClasses(),
      // 'books' => $this->APIModel->getFilteredBooks($seriesId, $subjectIdsArr),
      'books' => $this->APIModel->getFilteredBooks(),
    ];
    return $this->sendAPIResponse($data);
  }

  public function saveBooks()
  {
    // $booksIdsArr = $this->input->post('selectedBooks');
    $rawData = file_get_contents("php://input"); // Read raw JSON input
    $data = json_decode($rawData, true); // Decode JSON into an associative array
    $booksIdsArr = $data['selectedBooks'] ?? []; // Extract selectedBooks
    $selectedSeries = $data['selectedSeries'];

    $userId = $this->session->userdata('user_id');

    $success = $this->APIModel->saveUserBooks($userId, $booksIdsArr);
    $data = [
      'success' => $success,
      'message' => $success ? 'Books saved successfully' : 'Something went wrong.',
      'redirect' => base_url('dashboard')
    ];
    return $this->sendAPIResponse($data);
  }

  public function getStates()
  {
    $data = $this->AuthModel->getStates();
    return $this->sendAPIResponse($data);
  }

  public function getCities()
  {
    $stateID = $this->input->get('state');
    $data = $this->AuthModel->getCities($stateID);
    return $this->sendAPIResponse($data);
  }

  public function updateSelections()
  {
    $rawData = file_get_contents("php://input"); // Read raw JSON input
    $data = json_decode($rawData, true); // Decode JSON into an associative array
    $selectedSubject = $data['selectedSubject'];
    $selectedBook = $data['selectedBook'];
    $selectedCategory = $data['selectedCategory'];

    $this->AuthModel->updateSessionSelection($selectedSubject, $selectedBook, $selectedCategory);
    return true;
  }
}
