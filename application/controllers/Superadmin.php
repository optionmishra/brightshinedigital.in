<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('AuthModel');
		$this->siteName = 'SyManSys Project Management System';
		//Ckeditor's configuration
	}

	function per_denied($msg)
	{
		$this->data['message'] = $msg;
		print_json($this->data);
	}

	public function login($msg = NULL)
	{
		$data = [
			'title' => 'Dashboard Login',
			'page' => 'login',
			'msg' => $msg,
			'logo' => $this->AuthModel->content('Logo'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'siteName' => $this->siteName
		];
		$this->load->view('superadmin/login', $data);
	}

	public function notfound()
	{
		$data = [
			'title' => 'Not Found Error',
			'page' => '404 error',
			'row' => $this->AuthModel->user_profile(),
			'cat' => $this->AuthModel->category(),
			'logo' => $this->AuthModel->content('Logo'),
			'mobile1' => $this->AuthModel->content('Mobile1'),
			'mobile2' => $this->AuthModel->content('Mobile2'),
			'email1' => $this->AuthModel->content('Email1'),
			'email2' => $this->AuthModel->content('Email2'),
			'address' => $this->AuthModel->content('Address'),
			'copyright' => $this->AuthModel->content('Copyright'),
			'count' => $this->AuthModel->state(),
			'subject' => $this->AuthModel->subject(),
			'classes' => $this->AuthModel->classes(),
			'siteName' => $this->siteName
		];
		$this->load->view('superadmin/404', $data);
	}

	private function check_isvalidated()
	{
		if (!$this->session->userdata('ausername')) {
			header("location:" . base_url('admin/login'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ausername');
		header("location:" . base_url('admin/login'));
	}

	function dashboard()
	{
		$this->check_isvalidated();
		$data = [
			'title' => 'Dashboard',
			'page' => 'dashboard',
			'row' => $this->AuthModel->user_profile(),
			'cat' => $this->AuthModel->category(),
			'sta_user' => $this->AuthModel->sta_user(),
			'tea_user' => $this->AuthModel->tea_user(),
			'sta_boards' => $this->AuthModel->sta_boards(),
			'sta_pub' => $this->AuthModel->sta_pub(),
			'sta_subject' => $this->AuthModel->sta_subject(),
			'subject' => $this->AuthModel->subject(),
			'sub' => $this->AuthModel->sub_ch(),
			'siteName' => $this->siteName
		];
		$this->load->view('globals/header', $data);
		$this->AuthModel->navbar();
		$this->load->view('superadmin/dashboard', $data);
		$this->load->view('globals/footer', $data);
	}

	public function process()
	{
		$result = $this->AuthModel->validate();
		if (!$result) {
			$msg = '<font color=red>Invalid username and/or password.</font>';
			$this->login($msg);
		} else {
			header("location:" . base_url() . "superadmin/dashboard");
		}
	}

	function permission()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Permission',
				'page' => 'Permission',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/permission', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function profile()
	{
		$this->check_isvalidated();
		$data = [
			'title' => 'Profile',
			'page' => 'My Profile',
			'row' => $this->AuthModel->user_profile(),
			'cat' => $this->AuthModel->category(),
			'siteName' => $this->siteName
		];
		$this->load->view('globals/header', $data);
		$this->AuthModel->navbar();
		$this->load->view('superadmin/profile', $data);
		$this->load->view('globals/footer', $data);
	}

	function user()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'User',
				'page' => 'User',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/user', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function user_update()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$id = $this->uri->segment(3);
			$res = $this->AuthModel->retrive_user_update($id);
			$data = [
				'title' => 'User',
				'page' => 'User',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'info' => $res,
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/user_update', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}


	function teacher_update()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$id = $this->uri->segment(3);
			$res = $this->AuthModel->retrive_teacher_update($id);
			// teacher classes (for old registrations)
			$teacher_classes = explode(',', $res[0]->classes);
			// for new registrations
			$series_classes =  unserialize($res[0]->series_classes);
			// $series_classes =  $this->AuthModel->get_teacher_series_classes($id);
			$teacher_series_arr = explode(',', $res[0]->subject);
			$teacher_series_details = $this->AuthModel->selectable_main_subjects($id);
			$series_with_all_classes = $this->AuthModel->get_series_all_classes($teacher_series_arr);
			$subject_series_s = $this->AuthModel->selectable_subject_series($id);
			$subject_series = $this->AuthModel->teacher_subject_series($id);
			$main_subjects_arr = $this->AuthModel->get_main_subjects_arr();
			$series_arr = $this->AuthModel->get_series_arr();
			$data = [
				'title' => 'User',
				'page' => 'User',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'info' => $res,
				'permissions' => $this->AuthModel->permission(),
				'country' => $this->AuthModel->country(),
				'board' => $this->AuthModel->board(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName,
				'series_classes' => $series_classes,
				'teacher_series_details' => $teacher_series_details,
				'series_with_all_classes' => $series_with_all_classes,
				'all_series_of_selected_board' => $this->AuthModel->subject_name($res[0]->board_name),
				'teacher_classes' => $teacher_classes,
				'teacher_series_arr' => $teacher_series_arr,
				'subject_series_s' => $subject_series_s,
				'subject_series' => $subject_series,
				'main_subjects_arr' => $main_subjects_arr,
				'series_arr' => $series_arr,
			];
			// echo '<pre>', var_dump($series_classes), '</pre>';
			// exit;
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/update_teacher', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function salesman()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Sales Person',
				'page' => 'Sales',
				'row' => $this->AuthModel->salesman_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/salesman', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function salesman_update()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$id = $this->uri->segment(3);
			$res = $this->AuthModel->retrive_salesman_update($id);
			$data = [
				'title' => 'User',
				'page' => 'User',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'info' => $res,
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/sales_update', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function board()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Board',
				'page' => 'Board',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/board', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function state()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'States',
				'page' => 'States',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/state', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function city()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'City',
				'page' => 'City',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'state' => $this->AuthModel->state(),
				// #modified
				'city' => $this->AuthModel->cities(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/city', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function web_user()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Students List',
				'page' => 'Students List',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/web_user', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function web_user_teacher()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Teacher List',
				'page' => 'Teacher List',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'country' => $this->AuthModel->country(),
				'board' => $this->AuthModel->board(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/web_user_teacher', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function publication()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Publications',
				'page' => 'Publications',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/publication', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function category()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Category',
				'page' => 'Category',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/category', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function websupport()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Question Generator',
				'page' => 'Question Generator',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'board' => $this->AuthModel->board(),
				'publication' => $this->AuthModel->publication(),
				'countn' => $this->AuthModel->staten(),
				'countw' => $this->AuthModel->statew(),
				'counte' => $this->AuthModel->statee(),
				'counts' => $this->AuthModel->states(),
				'msubject' => $this->AuthModel->msubject(),
				'subject' => $this->AuthModel->subject(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/websupport', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function support_update()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$id = $this->uri->segment(3);
			$res = $this->AuthModel->supportt($id);
			$data = [
				'title' => 'Update Question Generator',
				'page' => 'Update Question Generator',
				'info' => $res,
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'msubject' => $this->AuthModel->msubject(),
				'board' => $this->AuthModel->board(),
				'publication' => $this->AuthModel->publication(),
				'subject' => $this->AuthModel->subject(),
				'countn' => $this->AuthModel->staten(),
				'countw' => $this->AuthModel->statew(),
				'counte' => $this->AuthModel->statee(),
				'counts' => $this->AuthModel->states(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/support_update', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function subject()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Books',
				'page' => 'Books',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'msubject' => $this->AuthModel->msubject(),
				'classes' => $this->AuthModel->classes(),
				'series_s' => $this->AuthModel->series_s(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/subject', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}
	function series()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Series',
				'page' => 'Series',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'msubject' => $this->AuthModel->msubject(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/series', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}
	function msubject()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Main Subject',
				'page' => 'Main Subject',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'classes' => $this->AuthModel->classes(),
				'boards' => $this->AuthModel->board(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/msubject', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function summativeQuestion()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Summative Question',
				'page' => 'summativeQuestion',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'msubject' => $this->AuthModel->msubject(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/summativeQuestion', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}


	function objectQuestion()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Object Question',
				'page' => 'objectQuestion',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'msubject' => $this->AuthModel->msubject(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/objectiveQuestion', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function content()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Content',
				'page' => 'Content',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/content', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function classes()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Classes',
				'page' => 'Classes',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/classes', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function classess_section()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Classes Section',
				'page' => 'Classes_section',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'classes' => $this->AuthModel->classes(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/class_section', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function feedback()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Feedback',
				'page' => 'Feedback',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'projects' => $this->AuthModel->project(),
				'last_id' => $this->AuthModel->last_id(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/feedback', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}

	function test_question()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'title' => 'Test Question',
				'page' => 'Test Question',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $this->AuthModel->category(),
				'permissions' => $this->AuthModel->permission(),
				'siteName' => $this->siteName,
				'boards' => $this->AuthModel->board(),
				'msubjects' => $this->AuthModel->msubject(),
				'subjects' => $this->AuthModel->subject(),
				'book_questions' => $this->AuthModel->book_questions(),
			];
			// echo '<pre>', var_dump($data['book_questions']), '</pre>';
			// exit();
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/test_question', $data);
			$this->load->view('globals/footer', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}
	function batch_upload_instructions()
	{
		if ($this->session->userdata('level') == 'Super Admin') {
			$this->check_isvalidated();
			$data = [
				'boards' => $this->AuthModel->board(),
				'publications' => $this->AuthModel->publication(),
				'subjects' => $this->AuthModel->msubject(),
				'books' => $this->AuthModel->subject(),
				'classes' => $this->AuthModel->classes(),
				'support_categories' => $this->AuthModel->category(),
				'states' => $this->AuthModel->all_states(),
			];
			$this->load->view('superadmin/batch_upload_instructions', $data);
		} else {
			$this->per_denied('Permission Denied');
		}
	}
}
