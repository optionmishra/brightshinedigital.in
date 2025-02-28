<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Web extends CI_Controller
{

	public $error;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Permission');
		$this->load->helper('form');
		$this->load->model('AuthModel');
		$this->load->library('upload');
		$this->load->model('WebModel');
		$this->siteName = 'Brightshine Digital';
		//Ckeditor's configuration
	}

	function message($type, $msg, $data = null)
	{
		$this->data['type'] = $type;
		$this->data['message'] = $msg;
		$this->data['data'] = $data;
		print_json($this->data);
	}


	public function index($msg = null)
	{

		$data = [
			'title' => 'Panel Home',
			'page' => 'Home',
			'msg' => $msg,
			'logo' => $this->AuthModel->content_row('Logo'),
			'logo1' => $this->AuthModel->content_row('Logo_index'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			// 'address_row' => $this->AuthModel->content_row('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'count' => $this->AuthModel->state(),
			'subject' => $this->AuthModel->subject(),
			'msubject' => $this->AuthModel->msubject(),
			'classes' => $this->AuthModel->classes(),
			'siteName' => $this->siteName
		];
		// $this->load->view('globals/web/header_home', $data);
		$this->load->view('web/index', $data);
		// $this->load->view('globals/web/footer_home', $data);
	}

	private function check_isvalidated()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url());
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		header("location:" . base_url());
	}

	public function process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$res = $this->AuthModel->validate_web($username, $password);
		if (!$res) {
			$status = $this->session->userdata('status');
			$this->session->set_flashdata('error', 'Sorry! Email or Password is incorrect');
			redirect();
		} else {
			header("location:" . base_url() . 'web/welcome');
		}
	}

	public function welcome()
	{

		$user_id = $this->session->userdata('user_id');
		$data = [
			'user' => $this->WebModel->Webuser(),
			'selectable_subjects' => $this->AuthModel->msubject_mod($this->WebModel->Webuser()->subject),
			'selectable_classes' => $this->AuthModel->selectable_classes($this->session->userdata('main_subject'), $user_id),
		];

		$this->load->view('web/welcome', $data);
	}

	public function dashboard()
	{
		$this->check_isvalidated();
		$res = $this->AuthModel->default_product();
		$user_id = $this->session->userdata('user_id');
		$data = [
			'title' => 'Panel Dashboard',
			'page' => 'Panel Dashboard',
			'logo' => $this->AuthModel->content_row('Logo'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'weblink1' => $this->AuthModel->content_row('weblink1'),
			'weblink2' => $this->AuthModel->content_row('weblink2'),
			'weblink3' => $this->AuthModel->content_row('weblink3'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'board' => $this->AuthModel->board_name($this->session->userdata('board_name')),
			'publication' => $this->AuthModel->publication($this->session->userdata('publication')),
			'websupport_data' => $res,
			'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject')),
			'categories' => $this->AuthModel->category(),
			'stucategory' => $this->AuthModel->categoryx_student(),
			'classes' => $this->AuthModel->classes_array(),
			'classesteacher' => $this->AuthModel->classes_array(),
			'user' => $this->WebModel->Webuser(),
			'siteName' => $this->siteName,
			#mod
			'selectable_subjects' => $this->AuthModel->msubject_mod($this->WebModel->Webuser()->subject),
			'selectable_classes' => $this->AuthModel->selectable_classes($this->session->userdata('main_subject'), $user_id),
			'selectable_books' => $this->AuthModel->selectable_books($this->session->userdata('main_subject'), $this->session->userdata('classes')),
			'selectable_categories' => $this->AuthModel->get_categories($this->session->userdata('selected_book')),
		];
		// echo '<pre>', var_dump($this->session->userdata()), '</pre>';
		// echo '<pre>', var_dump($data['websupport_data']), '</pre>';
		// exit();

		// $this->load->view('globals/web/header', $data);
		$this->load->view('web/dashboard', $data);
		// $this->load->view('globals/web/footer', $data);
	}

	public function profile()
	{
		$this->check_isvalidated();
		$res = $this->AuthModel->default_product();
		$data = [
			'title' => 'My Profile',
			'page' => 'My Profile',
			'board' => $this->AuthModel->board(),
			'logo' => $this->AuthModel->content_row('Logo'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'publication' => $this->AuthModel->publication(),
			'states' => $this->AuthModel->get_statess(105),
			'default' => $res,
			'subject' => $this->AuthModel->subject(),
			'msubject' => $this->AuthModel->msubject(),
			'classes' => $this->AuthModel->classes(),
			'user' => $this->WebModel->Webuser(),
			'sub' => $this->WebModel->subjects(),
			'siteName' => $this->siteName
		];
		// $user = $this->WebModel->Webuser();
		// $states = $this->AuthModel->get_statess(105);
		// foreach ($user as $currUser) {
		// 	var_dump($currUser);
		// 	foreach ($states as $state) {
		// 		// echo '<pre>', var_dump($state['id']), '</pre>';
		// 		// var_dump($currUser->state . 'checking with' . $state->id);
		// 		if ($currUser->state == $state['id']) {
		// 			$debugging = 'success';
		// 		}
		// 	}
		// }
		// echo '<pre>', var_dump($debugging), '</pre>';
		// exit();
		$this->load->view('globals/web/header', $data);
		$this->load->view('web/profile', $data);
		$this->load->view('globals/web/footer', $data);
	}

	public function phptest()
	{
		$this->load->view('web/phptest');
	}

	public function help()
	{
		$data = [
			'title' => 'Help',
			'page' => 'Help',
			'logo' => $this->AuthModel->content('Logo'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'helps' => $this->AuthModel->content('Helps'),
			'help' => $this->AuthModel->content('Help'),
			'publication' => $this->AuthModel->publication(),
			'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject')),
			'count' => $this->AuthModel->state(),
			'subject' => $this->AuthModel->subject(),
			'classes' => $this->AuthModel->classes(),
			'siteName' => $this->siteName
		];
		$this->load->view('globals/web/header_home', $data);
		$this->load->view('web/help', $data);
		$this->load->view('globals/web/footer', $data);
	}

	public function helps()
	{
		$this->check_isvalidated();
		$res = $this->AuthModel->default_product();
		$data = [
			'title' => 'Help',
			'page' => 'Help',
			'board' => $this->AuthModel->board(),
			'logo' => $this->AuthModel->content('Logo'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'help' => $this->AuthModel->content('Help'),
			'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject')),
			'helps' => $this->AuthModel->content('Helps'),
			'publication' => $this->AuthModel->publication(),
			'count' => $this->AuthModel->state(),
			'default' => $res,
			'subject' => $this->AuthModel->subject(),
			'classes' => $this->AuthModel->classes(),
			'user' => $this->WebModel->Webuser(),
			'sub' => $this->WebModel->subjects(),
			'siteName' => $this->siteName
		];
		$this->load->view('globals/web/header', $data);
		$this->load->view('web/helps', $data);
		$this->load->view('globals/web/footer', $data);
	}

	public function teacher_que_query()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url());
		} else {
			$data = [
				'title' => 'Help',
				'page' => 'Help',
				'board' => $this->AuthModel->board(),
				'publication' => $this->AuthModel->publication(),
				'classes' => $this->AuthModel->classes(),
				'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject'))
			];

			$this->load->view('globals/web/header', $data);
			$this->load->view('web/teacher_reference', $data);
			$this->load->view('globals/web/footer', $data);
		}
	}


	public function student_reg($msg = null)
	{

		$data = [
			'title' => 'Student Registration',
			'page' => 'student_registration',
			'msg' => $msg,
			'logo' => $this->AuthModel->content('Logo'),
			'logo1' => $this->AuthModel->content_row('Logo_index'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'state' => $this->AuthModel->get_statess(),
			'subject' => $this->AuthModel->subject(),
			'classes' => $this->AuthModel->classes(),
			'siteName' => $this->siteName
		];


		$this->load->view('globals/web/header_reg', $data);
		$this->load->view('web/student_registration', $data);
		$this->load->view('globals/web/footer_reg', $data);
	}

	public function teacher_reg($msg = null)
	{

		$data = [
			'title' => 'Teacher Registration',
			'page' => 'teacher_registration',
			'msg' => $msg,
			'logo' => $this->AuthModel->content('Logo'),
			'logo1' => $this->AuthModel->content_row('Logo_index'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'country' => $this->AuthModel->country(),
			'board' => $this->AuthModel->board(),
			'classes' => $this->AuthModel->classes(),
			'siteName' => $this->siteName
		];


		$this->load->view('globals/web/header_reg', $data);
		$this->load->view('web/teacher_registration', $data);
		$this->load->view('globals/web/footer_reg', $data);
	}

	public function teacher_panel()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Teacher Panel',
				'page' => 'Teacher_Panel',
				'logo' => $this->AuthModel->content_row('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'classes' => $this->AuthModel->classes_teacher_new($this->session->userdata('teacher_classess'), $this->session->userdata('teacher_code')),
				'user' => $this->WebModel->Webuser(),
				'sub' => $this->WebModel->subjects(),
				'student' => $this->AuthModel->teacher_student(),
				'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject')),
			];
			$this->load->view('globals/web/header', $data);
			$this->load->view('web/teacher_panel', $data);
			$this->load->view('globals/web/footer', $data);
		}
	}


	public function test_assign()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Test Assign',
				'page' => 'Test assign',
				'logo' => $this->AuthModel->content_row('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'classes' => $this->AuthModel->classes_teacher_new($this->session->userdata('teacher_classess'), $this->session->userdata('teacher_code')),
				'user' => $this->WebModel->Webuser(),
				'assigntest' => $this->AuthModel->assigntest($this->session->userdata('teacher_code')),
				'class_section_array' => $this->AuthModel->class_section_array(),
			];
			// echo var_dump($this->AuthModel->class_section_array());
			// exit();

			$this->load->view('globals/web/header', $data);
			$this->load->view('web/test_assign', $data);
			$this->load->view('globals/web/footer', $data);
		}
	}
	public function result()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Result',
				'page' => 'Result',
				'logo' => $this->AuthModel->content_row('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'classes' => $this->AuthModel->classes_teacher_new($this->session->userdata('teacher_classess'), $this->session->userdata('teacher_code')),
				'user' => $this->WebModel->Webuser(),
				'assigntest' => $this->AuthModel->assigntest($this->session->userdata('teacher_code'))
			];
			// echo var_dump($data['classes']);
			// exit();
			$this->load->view('globals/web/header', $data);
			$this->load->view('web/result', $data);
			$this->load->view('globals/web/footer', $data);
		}
	}

	public function student_panel()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$student_code = $this->session->userdata('stu_teacher_code');
			$date = date("Y-m-d");
			$date2 = date('Y-m-d', strtotime($date . " + 1 day"));

			$checkpaper = $this->AuthModel->check_class_paper($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2);
			if ($checkpaper) {

				$check_subjective_1 = $this->AuthModel->check_subjective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '21');
				$check_subjective_2 = $this->AuthModel->check_subjective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '22');

				$check_objective_1 = $this->AuthModel->check_objective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '11');
				$check_objective_2 = $this->AuthModel->check_objective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '12');
				$check_objective_3 = $this->AuthModel->check_objective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '13');
				$check_objective_4 = $this->AuthModel->check_objective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '14');

				$sub1_date = $check_subjective_1['date_end'];
				$sub2_date = $check_subjective_2['date_end'];
				$ob1_date = $check_objective_1['date_end'];
				$ob2_date = $check_objective_2['date_end'];
				$ob3_date = $check_objective_3['date_end'];
				$ob4_date = $check_objective_4['date_end'];

				if ($check_subjective_1) {
					$assignid_test1 = $check_subjective_1['id'];
					$subjective_test1 = $this->AuthModel->check_subjective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid_test1, '21');
					if (!$subjective_test1) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$subjective_test1 = '';
					}
				}
				if ($check_subjective_2) {
					$assignid_test2 = $check_subjective_2['id'];
					$subjective_test2 = $this->AuthModel->check_subjective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid_test2, '22');
					if (!$subjective_test2) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$subjective_test2 = '';
					}
				}
				// else {

				// 	$subjective = '';
				// 	$msg = 'You are already Done! Thank You.';
				// 	// $msg = 'Your Paper will be started on:- ';
				// }
				if ($check_objective_1) {

					$assignid2_1 = $check_objective_1['id'];
					$objective_test1 = $this->AuthModel->check_objective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid2_1, '11');
					if (!$objective_test1) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$objective_test1 = '';
					}
				} else {

					$objective_test1 = '';
					$msg = 'You are already Done! Thank You.';
					// $msg = 'Your Paper will be started on:- ';
				}
				if ($check_objective_2) {

					$assignid2_2 = $check_objective_2['id'];
					$objective_test2 = $this->AuthModel->check_objective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid2_2, '12');
					if (!$objective_test2) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$objective_test2 = '';
					}
				} else {

					$objective = '';
					$msg = 'You are already Done! Thank You.';
					// $msg = 'Your Paper will be started on:- ';
				}
				if ($check_objective_3) {

					$assignid2_3 = $check_objective_3['id'];
					$objective_test3 = $this->AuthModel->check_objective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid2_3, '13');
					if (!$objective_test3) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$objective_test3 = '';
					}
				} else {

					$objective = '';
					$msg = 'You are already Done! Thank You.';
					// $msg = 'Your Paper will be started on:- ';
				}
				if ($check_objective_4) {

					$assignid2_4 = $check_objective_4['id'];
					$objective_test4 = $this->AuthModel->check_objective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid2_4, '14');
					if (!$objective_test4) {
						// } else {
						$msg = 'You are already Done! Thank You.';
						$objective_test4 = '';
					}
				} else {

					$objective = '';
					$msg = 'You are already Done! Thank You.';
					// $msg = 'Your Paper will be started on:- ';
				}
			} else {
				$subjective_test1 = '';
				$subjective_test2 = '';
				$objective_test1 = '';
				$objective_test2 = '';
				$objective_test3 = '';
				$objective_test4 = '';
				$msg = 'No test has been assigned yet';
			}

			$data = [
				'title' => 'Student Panel',
				'page' => 'Student panel',
				'logo' => $this->AuthModel->content_row('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'user' => $this->WebModel->Webuser(),
				'classes' => $this->AuthModel->classes_teacher($this->session->userdata('classes')),
				'subjective_test1' => $subjective_test1,
				'subjective_test2' => $subjective_test2,
				'objective_test1' => $objective_test1,
				'objective_test2' => $objective_test2,
				'objective_test3' => $objective_test3,
				'objective_test4' => $objective_test4,
				'msg' => $msg,
				'sub1_date' => $sub1_date,
				'sub2_date' => $sub2_date,
				'ob1_date' => $ob1_date,
				'ob2_date' => $ob2_date,
				'ob3_date' => $ob3_date,
				'ob4_date' => $ob4_date,
			];
			// echo var_dump($this->session->userdata());
			// exit();
			$this->load->view('globals/web/header', $data);
			$this->load->view('web/student_panel');
			$this->load->view('globals/web/footer', $data);
		}
	}

	public function subjective_paper()
	{
		$paper_mode =  $this->input->post('paper_mode');
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$student_code = $this->session->userdata('stu_teacher_code');
			$date = date("Y-m-d");
			$date2 = date('Y-m-d', strtotime($date . " + 1 day"));

			$checkpaper = $this->AuthModel->check_class_paper($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2);
			if ($checkpaper) {

				$check_subjective = $this->AuthModel->check_subjective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, $paper_mode);
				// $check_subjective_test2 = $this->AuthModel->check_subjective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, '22');

				if ($check_subjective) {
					$assignid = $check_subjective['id'];
					$subject = $this->AuthModel->check_subjective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid, $paper_mode);
					// var_dump($subject);
					// exit();
					if ($subject) {
						$subjective = $this->AuthModel->summativeQues($this->session->userdata('main_subject'), $this->session->userdata('classes'), $check_subjective['paper_mode']);
					}
					// } else {
					// 	$msg = 'Your are already Done! Thanku.';
					// 	$subjective = '';
					// }
				}
				// if ($check_subjective_test2) {
				// 	$assignid_test2 = $check_subjective_test2['id'];
				// 	$subject_test2 = $this->AuthModel->check_subjective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid_test2);
				// 	if ($subject_test2) {
				// 		$subjective_test2 = $this->AuthModel->summativeQues($this->session->userdata('main_subject'), $this->session->userdata('classes'), $check_subjective_test2['paper_mode']);
				// 	}
				// }
				//  else {

				// 	$subjective = '';
				// 	$msg = 'Not to be Started';
				// }
			} else {
				$msg = 'Not Any Paper Assign';
				$objective = '';
			}
			$data = [
				'title' => 'Subjective Question',
				'page' => 'Subjective Question',
				'logo' => $this->AuthModel->content('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'subjective' => $subjective,
				// 'subjective_test2' => $subjective_test2,
				'assignid' => $assignid,
				// 'assignid_test2' => $assignid_test2,
				'msg' => $msg,
				'created_date' => $check_subjective['created_date'],
				'paper_mode' => $paper_mode,
				'paper_set' => $this->AuthModel->get_paper_set($this->session->userdata('classes'), $this->session->userdata('main_subject'), $paper_mode),
			];
			// var_dump($check_subjective_test1);
			// echo '<pre>', var_dump($this->session->userdata()), '</pre>';
			// exit();
			$this->load->view('web/summative_paper', $data);
		}
	}

	public function objective_paper()
	{
		$paper_mode =  $this->input->post('paper_mode');
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$student_code = $this->session->userdata('stu_teacher_code');
			$date = date("Y-m-d");
			$date2 = date('Y-m-d', strtotime($date . " + 1 day"));

			$checkpaper = $this->AuthModel->check_class_paper($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2);
			if ($checkpaper) {

				$check_objective = $this->AuthModel->check_objective($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $date, $date2, $paper_mode);

				if ($check_objective) {
					$assignid = $check_objective['id'];
					$object = $this->AuthModel->check_objective_submission($this->session->userdata('classes'), $this->session->userdata('section'), $student_code, $assignid, $paper_mode);
					if ($object) {
						$objective = $this->AuthModel->objectiveQues($this->session->userdata('main_subject'), $this->session->userdata('classes'), $check_objective['paper_mode']);
					} else {
						$msg = 'Your are already Done! Thank You.';
						$objective = '';
					}
				} else {

					$objective = '';
					$msg = 'Not to be Started';
				}
			} else {
				$msg = 'Not Any Paper Assign';
				$objective = '';
			}
			$data = [
				'title' => 'Objective Question',
				'page' => 'Objective Question',
				'logo' => $this->AuthModel->content('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'objective' => $objective,
				'assignid' => $assignid,
				'msg' => $msg,
				'created_date' => $check_objective['created_date'],
				'paper_mode' => $paper_mode,
				'paper_set' => $this->AuthModel->get_paper_set($this->session->userdata('classes'), $this->session->userdata('main_subject'), $paper_mode),
			];
			// var_dump($check_objective);
			// exit();
			$this->load->view('web/objective_paper', $data);
		}
	}

	public function preview_question()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Preview Student Panel',
				'page' => 'Preview Student panel',
				'logo' => $this->AuthModel->content_row('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'user' => $this->WebModel->Webuser(),
				'classes' => $this->AuthModel->classes_teacher($this->session->userdata('classes'))
			];
			$this->load->view('globals/web/header', $data);
			$this->load->view('web/preview_question');
			$this->load->view('globals/web/footer', $data);
		}
	}

	public function pre_summative_paper()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Preview Summative Question',
				'page' => 'Preview Summative Question',
				'logo' => $this->AuthModel->content('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'summative' => $this->AuthModel->summativeQues()
			];

			$this->load->view('web/pre_summative_paper', $data);
		}
	}

	public function pre_objective_paper()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$data = [
				'title' => 'Preview Objective Question',
				'page' => 'Preview Objective Question',
				'logo' => $this->AuthModel->content('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'objective' => $this->AuthModel->objectiveQues()
			];
			$this->load->view('web/pre_objective_paper', $data);
		}
	}

	public function view_subjective_paper()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {
			$student_id  = $this->uri->segment(3);
			// $test_assign_id  = $this->uri->segment(4);
			$paper_mode  = $this->uri->segment(4);
			$check_student = $this->AuthModel->check_student_paper($student_id);
			$summative = $this->AuthModel->summativeQuestion_solved_for_view($student_id, $paper_mode);

			if (!$check_student) {

				header("location:" . base_url('web/teacher_panel'));
			} else {

				$data = [
					'title' => 'View Summative Question',
					'page' => 'view Summative Question',
					'logo' => $this->AuthModel->content('Logo'),
					'logo1' => $this->AuthModel->content_row('Logo_index'),
					'mobile1' => $this->AuthModel->content('Mobile1'),
					'mobile2' => $this->AuthModel->content('Mobile2'),
					'email1' => $this->AuthModel->content('Email1'),
					'email2' => $this->AuthModel->content('Email2'),
					'address' => $this->AuthModel->content('Address'),
					'copyright' => $this->AuthModel->content('Copyright'),
					'summative' => $summative,
					'student' => $this->AuthModel->webu($student_id)[0],
					'paper_set' => $this->AuthModel->get_paper_set($summative[0]->student_class, $summative[0]->series, $paper_mode),
				];

				$this->load->view('web/view_summative_paper', $data);
			}
		}
	}

	public function view_objective_paper()
	{

		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {

			$id  = $this->uri->segment(3);
			$paper_mode  = $this->uri->segment(4);

			$check_student = $this->AuthModel->check_student_paper($id);
			$objective = $this->AuthModel->objectiveQuestion_solved($id, $paper_mode);

			if (!$check_student) {

				header("location:" . base_url('web/teacher_panel'));
			} else {

				$data = [
					'title' => 'View Summative Question',
					'page' => 'view Summative Question',
					'logo' => $this->AuthModel->content('Logo'),
					'logo1' => $this->AuthModel->content_row('Logo_index'),
					'mobile1' => $this->AuthModel->content('Mobile1'),
					'mobile2' => $this->AuthModel->content('Mobile2'),
					'email1' => $this->AuthModel->content('Email1'),
					'email2' => $this->AuthModel->content('Email2'),
					'address' => $this->AuthModel->content('Address'),
					'copyright' => $this->AuthModel->content('Copyright'),
					'objective' => $objective,
					'student' => $this->AuthModel->webu($id)[0],
					'paper_set' => $this->AuthModel->get_paper_set($objective[0]->student_class, $objective[0]->series, $paper_mode),
				];
				// echo '<pre>', var_dump($objective), '</pre>';
				// echo var_dump($data['paper_set']);
				// exit();
				$this->load->view('web/view_objective_paper', $data);
			}
		}
	}


	public function marks_submit()
	{
		$data = [
			'title' => 'Marks Submit',
			'page' => 'Marks Submit',
			'logo' => $this->AuthModel->content('Logo'),
			'logo1' => $this->AuthModel->content_row('Logo_index'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright')
		];

		$this->load->view('web/marks_edit', $data);
	}

	public function printPaperpdf()
	{

		if (!$this->session->userdata('username')) {
			header("location:" . base_url('web/logout'));
		} else {

			$id  = $this->uri->segment(3);

			$data = [
				'title' => 'Print Paper',
				'page' => 'print paper',
				'logo' => $this->AuthModel->content('Logo'),
				'logo1' => $this->AuthModel->content_row('Logo_index'),
				'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
				'mobile1' => $this->AuthModel->content('Mobile1'),
				'mobile2' => $this->AuthModel->content('Mobile2'),
				'email1' => $this->AuthModel->content('Email1'),
				'email2' => $this->AuthModel->content('Email2'),
				'address' => $this->AuthModel->content('Address'),
				'copyright' => $this->AuthModel->content('Copyright'),
				'objective' => $this->AuthModel->objectiveQues()
			];
			$this->load->view('web/generate_pdf', $data);
		}
	}

	public function student_profile()
	{
		$data = [
			'title' => 'Teacher Panel',
			'page' => 'Teacher_Panel',
			'logo' => $this->AuthModel->content_row('Logo'),
			'logo1' => $this->AuthModel->content_row('Logo_index'),
			'footer_logo' => $this->AuthModel->content_row('Logo Footer 2'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'classes' => $this->AuthModel->classes_teacher($this->session->userdata('teacher_classess')),
			'user' => $this->WebModel->Webuser(),
			'sub' => $this->WebModel->subjects(),
			'student' => $this->AuthModel->teacher_student(),
			'msubject' => $this->AuthModel->msubject($this->session->userdata('main_subject'))
		];


		$this->load->view('globals/web/header', $data);
		$this->load->view('web/teacher_edit_student_profile', $data);
		$this->load->view('globals/web/footer', $data);
	}
}
