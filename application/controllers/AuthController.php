<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct(); // Initialize parent constructor to load core properties
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->model('AuthModel');
    $this->load->model('APIModel');
  }

  public function teacherRegistrationIndex()
  {
    $data = [
      'countries' => $this->AuthModel->country(),
      'states' => $this->AuthModel->getStates(),
    ];

    $this->load->view('globals/web/header');
    $this->load->view('web/teacher-registration', $data);
    $this->load->view('globals/web/footer');
  }

  public function teacherRegistrationStore()
  {
    $email = $this->input->post('email');

    $accountExist = $this->WebModel->validate_email($email);
    if ($accountExist) {
      $this->session->set_flashdata('error', 'Email ID is already in Use.');
      return  redirect(base_url('/teacher-registration'));
    }

    $teacher_code = $this->randomPass(10);


    $data = [
      'fullname' => $this->input->post('fullname'),
      'mobile' => $this->input->post('phone'),
      'teacher_code' => $teacher_code,
      'email' => $email,
      'pin' => $this->input->post('pin'),
      'address' => $this->input->post('address'),
      'principal_name' => $this->input->post('principalName'),
      'country' => $country,
      'city' => $this->input->post('district'),
      'state' => $this->input->post('state'),
      'board_name' => $this->input->post('board'),
      'user_type' => 'Teacher',
      'status' => 0,
      'stu_limit' => 60,
      'school_name' => $this->input->post('schoolName'),
      'password' => $this->input->post('password'),
      // 'session_start' => $start_session,
      // 'session_end' => $end_session,
    ];

    $userCreation = $this->AuthModel->addWebUser($data);

    $emailData = [
      'user' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'fullname' => $this->input->post('name'),
      'logo' => $this->AuthModel->content_row('Logo'),
      'mobile1' => $this->AuthModel->content_row('Mobile1'),
    ];
    $config = array(
      'charset' => 'utf-8',
      'wordwrap' => TRUE,
      'mailtype' => 'html'
    );


    $this->email->initialize($config);
    $this->email->to($this->input->post('email'));
    $this->email->from('info@brightshinedigital.in', 'Brightshine Digital');
    $this->email->cc('mayank@epochstudio.net, info@brightshinedigital.in');
    $this->email->subject('Your Credentials for Brightshine Digital Web Support');
    $this->email->message($this->load->view('web/email_template', $emailData, true));
    $this->email->send();
    if (!$userCreation) {
      $this->session->set_flashdata('error', 'Something is wrong! You are not registered');
      return redirect(base_url('/teacher-registration'));
    } else {

      $this->session->set_flashdata('success', 'Select your books to register with BrightShine and wait for verification. Check your registered email id for your account details.');

      $res = $this->AuthModel->validate_web($this->input->post('email'), $this->input->post('password'), '0');
      return redirect(base_url('/book-selection'));
    }
  }

  public function studentRegistrationIndex()
  {
    $data = [
      'classes' => $this->APIModel->getAllClasses(),
    ];


    $this->load->view('globals/web/header');
    $this->load->view('web/student-registration', $data);
    $this->load->view('globals/web/footer');
  }

  public function studentRegistrationStore()
  {
    $email = $this->input->post('email');

    $accountExist = $this->WebModel->validate_email($email);
    if ($accountExist) {
      $this->session->set_flashdata('error', 'Email ID is already in Use.');
      return  redirect(base_url('student-registration'));
    }

    $teacherCode = $this->input->post('teacherCode');
    $classId = $this->input->post('class');
    $checkTeacherCode = $this->WebModel->validate_student_mod($teacherCode);
    if (empty($checkTeacherCode)) {
      $this->session->set_flashdata('error', 'Teacher Code is Not Valid!!');
      return redirect(base_url('student-registration'));
    } elseif ($checkTeacherCode === 'limit_exhausted') {
      $this->session->set_flashdata('error', 'Teacher Code has reached its limit!!');
      return redirect(base_url('student-registration'));
    } else {

      $data = [
        'fullname' => $this->input->post('fullname'),
        'mobile' => $this->input->post('phone'),
        'email' => $email,
        'stu_teacher_id' => $teacherCode,
        // 'class' => $classId,
        // 'pin' => $this->input->post('pin'),
        // 'address' => $this->input->post('address'),
        // 'principal_name' => $this->input->post('principalName'),
        // 'country' => $country,
        // 'city' => $this->input->post('district'),
        // 'state' => $this->input->post('state'),
        // 'board_name' => $this->input->post('board'),
        'user_type' => 'Student',
        'status' => 1,
        // 'stu_limit' => 30,
        // 'school_name' => $this->input->post('schoolName'),
        'password' => $this->input->post('password'),
        // 'session_start' => $start_session,
        // 'session_end' => $end_session,
      ];


      $userCreation = $this->AuthModel->addWebUser($data);

      if ($userCreation) {

        $this->APIModel->assignBooksToStudent($userCreation->id, $teacherCode, $classId);

        $emailData = [
          'user' => $this->input->post('email'),
          'password' => $this->input->post('password'),
          'fullname' => $this->input->post('name'),
          'logo' => $this->AuthModel->content_row('Logo'),
          'mobile1' => $this->AuthModel->content_row('Mobile1'),
        ];
        $config = array(
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'mailtype' => 'html'
        );

        $this->email->initialize($config);
        $this->email->to($this->input->post('email'));
        $this->email->from('info@brightshinedigital.in', 'Brightshine Digital');
        $this->email->cc('mayank@epochstudio.net, info@brightshinedigital.in');
        $this->email->subject('Your Credentials for Brightshine Digital Web Support');
        $this->email->message($this->load->view('web/email_template', $emailData, true));
        $this->email->send();

        $this->session->set_flashdata('success', 'You are registered with BrightShine, please wait for verification. Check your registered email id for your account details.');
        return redirect(base_url('student-registration'));
      } else {
        $this->session->set_flashdata('error', 'Something is wrong! You are not registered');
        return redirect(base_url('student-registration'));
      }
    }
  }

  public function bookSelection()
  {
    if (!$this->AuthModel->isSeriesAssgined()) {
      $this->load->view('globals/web/header');
      $this->load->view('web/book-selection');
      $this->load->view('globals/web/footer');
    } else {
      redirect(base_url());
    }
  }

  private function randomPass($numchar)
  {
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
    $array = explode(",", $word);
    shuffle($array);
    $newstring = implode($array);
    return substr($newstring, 0, $numchar);
  }
}
