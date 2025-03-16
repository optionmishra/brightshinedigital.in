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
    $boards = $this->APIModel->getAllBoards();
    // $seriesId = $allSeries[0]->id;
    // $subjects = $this->APIModel->getSubjectsBySeriesId($seriesId);
    // $subjectIdsArr = array_map(fn($subject) => $subject->id, $subjects);
    $userId = $this->session->userdata('web_user_id');
    $data = [
      'boards' => $boards,
      'series' => $allSeries,
      // 'subjects' => $subjects,
      'subjects' => $allSubjects,
      'classes' => $this->APIModel->getAllClasses(),
      // 'books' => $this->APIModel->getFilteredBooks($seriesId, $subjectIdsArr),
      'books' => $this->APIModel->getFilteredBooks(),
      'selectedBoard' => $this->AuthModel->isSeriesAssgined($userId) ? $this->APIModel->getSelectedBoard($userId) : "",
      'selectedBooks' => $this->AuthModel->isSeriesAssgined($userId) ?  $this->APIModel->getSelectedBooks($userId) : [],
    ];
    return $this->sendAPIResponse($data);
  }

  public function saveBooks()
  {
    // $booksIdsArr = $this->input->post('selectedBooks');
    $rawData = file_get_contents("php://input"); // Read raw JSON input
    $data = json_decode($rawData, true); // Decode JSON into an associative array
    $booksIdsArr = $data['selectedBooks'] ?? []; // Extract selectedBooks
    $selectedBoard = $data['selectedBoard'];

    $userId = $this->session->userdata('web_user_id');
    $updateUserBoard = $this->APIModel->updateUserBoard($userId, $selectedBoard);

    $success = $this->APIModel->saveUserBooks($userId, $booksIdsArr);
    $data = [
      'success' => $success,
      'message' => $success ? 'Books saved successfully' : 'Something went wrong.',
      'redirect' => $this->session->userdata('ausername') ? base_url('superadmin/web_user_teacher') : base_url('dashboard')
    ];
    $this->session->set_flashdata('success', 'Books saved successfully');
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
