<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AuthModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('WebModel');
	}

	public function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin = $this->db->query("SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1", [$username, $password]);
		$adm = $admin->result();
		if ($admin->num_rows() == 1) {
			$this->session->set_userdata('ausername', $username);
			//$this->session->set_userdata('password', $password);
			$this->session->set_userdata('level', $adm[0]->level);
			$this->session->set_userdata('userType', $adm[0]->user_type);
			$cur_time = date("l jS \of F Y h:i:s A");
			//   $last_login = $this->db->query("UPDATE user SET last_login = $cur_time' WHERE username = ? AND password = ? ", [$username, $password]);
			return true;
		}

		return false;
	}

	public function val_email($email)
	{
		if (!empty($email)) {
			$this->db->where('email', $email);
		}
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	public function check_student_paper($id)
	{
		if (!empty($id)) {
			$this->db->where('student_id', $id);
			$res = $this->db->get('paper_submision')->result();
			return $res;
		}
	}
	// to view the paper
	public function check_student_paper_for_view($student_id, $test_assign_id)
	{
		if (!empty($student_id)) {
			$this->db->where('student_id', $student_id);
			$this->db->where('assign_id', $test_assign_id);
			$res = $this->db->get('paper_submision')->result();
			return $res;
		}
	}

	public function navbar()
	{
		$level = $this->session->userdata('level');
		if ($level == "Super Admin") {
			$admin = $this->load->view('globals/navbar');
			return $admin;
		} else if ($level == "Admin") {
			$admin = $this->load->view('globals/navbar');
			return $admin;
		} else {
			return false;
		}
	}

	function retrieveRecord($table, $condCol = null, $id = null)
	{
		if (!empty($id)) {
			$this->db->where($condCol, $id);
		}
		$res = $this->db->get($table)->result();
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return $res;
		}
	}

	function boardx()
	{
		$res = $this->db->get('board', 1)->result();
		return $res;
	}

	function publicationx()
	{
		$res = $this->db->get('publication', 1)->result();
		return $res;
	}

	function categoryx()
	{
		$this->db->order_by('orderb', 'asc');
		$res = $this->db->get('category', 1)->result();
		return $res;
	}

	function classesx()
	{
		$id = $this->session->userdata('teacher_classess');
		$class_id = explode(',', $id);
		$fst_class = $class_id[0];
		$this->db->where('id', $fst_class);
		$res = $this->db->get('classes')->result();
		return $res;
	}
	function get_class($id)
	{
		$this->db->where('id', $id);
		$res = $this->db->get('classes')->row();
		return $res;
	}

	function subjectx()
	{
		$res = $this->db->get('subject', 1)->result();
		return $res;
	}

	function asubjectx($ss)
	{
		$this->db->where('sid', $ss);
		$res = $this->db->get('subject', 1)->result();
		return $res;
	}

	function rsubjectx($rr)
	{
		$this->db->where('sid', $rr);
		$res = $this->db->get('subject', 1)->result();
		return $res;
	}

	function ssubjectx($rs)
	{
		$this->db->where('sid', $rs);
		$res = $this->db->get('subject')->result();
		return $res;
	}

	function msubjectx()
	{
		$res = $this->db->get('main_subject', 1)->result();
		return $res;
	}

	function summativeQues($series, $class, $question_type)
	{
		$this->db->where('series', $series);
		$this->db->where('class', $class);
		$this->db->where('question_type', $question_type);
		// changed where to or where in
		// $this->db->or_where_in('question_type', ['21', '22']);
		$res = $this->db->get('touch_question')->result();
		return $res;
	}

	function view_student_summativeQues($id)
	{
		$this->db->where('paper_mode', 'subjective');
		$this->db->where('student_id', $id);
		$res = $this->db->get('paper_submision')->result();
		return $res;
	}

	function summativeQuestion_solved($id, $paper_mode)
	{
		$this->db->select('touch_question.name');
		$this->db->select('paper_submision.*');
		$this->db->from('paper_submision as paper_submision');
		$this->db->join('touch_question as touch_question', 'paper_submision.question_id=touch_question.id', 'INNER');
		$this->db->where('paper_mode', $paper_mode);
		$this->db->where('student_id', $id);
		$res = $this->db->get()->result();
		return $res;
	}
	function summativeQuestion_solved_for_view($student_id, $paper_mode)
	{
		$this->db->select('touch_question.name,touch_question.series');
		$this->db->select('paper_submision.*');
		$this->db->from('paper_submision as paper_submision');
		$this->db->join('touch_question as touch_question', 'paper_submision.question_id=touch_question.id', 'INNER');
		$this->db->where('paper_mode', $paper_mode);
		$this->db->where('student_id', $student_id);
		// $this->db->where('assign_id', $assign_id);
		$res = $this->db->get()->result();
		return $res;
	}


	function objectiveQuestion_solved($id, $paper_mode)
	{
		$this->db->select('touch_question.name,touch_question.series, touch_question.option_a, touch_question.option_b, touch_question.option_c, touch_question.option_d, touch_question.answer as correct_answer');
		$this->db->select('paper_submision.*');
		$this->db->from('paper_submision as paper_submision');
		$this->db->join('touch_question as touch_question', 'paper_submision.question_id=touch_question.id', 'INNER');
		$this->db->where('paper_mode', $paper_mode);
		$this->db->where('student_id', $id);
		$res = $this->db->get()->result();
		return $res;
	}

	function objectiveQues($series, $class, $question_type)
	{
		$this->db->where('series', $series);
		$this->db->where('class', $class);
		$this->db->where('question_type', $question_type);
		$res = $this->db->get('touch_question')->result();
		return $res;
	}


	function check_assign_paper($teacher_code, $class, $section, $paper_code)
	{
		$this->db->where('teacher_code', $teacher_code);
		$this->db->where('class_name', $class);
		$this->db->where('section_name', $section);
		$this->db->where('paper_mode', $paper_code);
		$res = $this->db->get('paper_assign')->result();

		if (!$res) {
			//$this->error = $this->db->error()['message'];
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function summativeQuestion()
	{
		$this->db->select('main_subject.name as subsName');
		$this->db->select('touch_question.*');
		$this->db->from('touch_question as touch_question');
		$this->db->join('main_subject as main_subject', 'touch_question.series=main_subject.id', 'INNER');
		$this->db->where('question_type', '1');
		$res = $this->db->get()->result();
		return $res;
	}

	function create_summativeQuestion($data)
	{
		$res = $this->db->insert('touch_question', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_summativeQuestion($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('touch_question');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_paper_submision_marks($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('paper_submision');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function objectiveQuestion()
	{
		$this->db->select('main_subject.name as subsName');
		$this->db->select('touch_question.*');
		$this->db->from('touch_question as touch_question');
		$this->db->join('main_subject as main_subject', 'touch_question.series=main_subject.id', 'INNER');
		$this->db->where('question_type', '2');
		$res = $this->db->get()->result();
		return $res;
	}

	function create_objectiveQuestion($data)
	{
		$res = $this->db->insert('touch_question', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_objectiveQuestion($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('touch_question');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function categorydemo()
	{
		$this->db->where('id', 11);
		$this->db->order_by('orderb', 'asc');
		$res = $this->db->get('category')->result();
		return $res;
	}

	function msubjectxdemo()
	{
		$this->db->where('id', 25);
		$res = $this->db->get('main_subject')->result();
		return $res;
	}

	function validate_web($username, $password, $status = '1')
	{
		$publication = $this->AuthModel->publicationx();
		$admin = $this->db->query("SELECT * FROM web_user WHERE email = ? AND password = ? AND status = ? LIMIT 1", [$username, $password, $status]);
		$adminRow = $admin->row();

		if ($adminRow) {
			$userData = (array)$adminRow;
			$userSubject = explode(',', $userData['subject'])[0] ?? null;
			$selectedBook = $this->AuthModel->selectable_books($userSubject, $userData['classes'])[0] ?? null;
			$category = $this->AuthModel->get_categories($selectedBook->id) ?? null;

			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('user_id', $userData['id']);
			$this->session->set_userdata('password', $password);
			$this->session->set_userdata('type', $userData['user_type']);

			if ($userData['user_type'] == 'Student' && $userSubject && $selectedBook && $category) {
				$this->setStudentSession($userData, $publication, $category, $selectedBook);
			} elseif ($userData['user_type'] == 'Teacher') {
				$this->setTeacherSession($userData, $publication, $category, $selectedBook);
			}

			$this->updateSessionSelection();
			return true;
		}


		return false;
	}

	private function setStudentSession($userData, $publication, $category, $selectedBook)
	{
		$this->session->set_userdata([
			'publication' => $publication[0]->id,
			'classes' => $userData['classes'],
			'class_name' => $this->AuthModel->get_class($userData['classes'])->name,
			'section' => $userData['class_section'],
			'status' => $userData['status'],
			'stu_teacher_code' => $userData['stu_teacher_id'],
			'main_subject' => $userData['subject'],
			'board_name' => $userData['board_name'],
			'publication_name' => $publication[0]->name,
			'category' => $category[0]->id,
			'category_name' => $category[0]->name,
			'school_name' => $category[0]->school_name,
		]);
	}

	private function setTeacherSession($userData, $publication, $category, $selectedBook)
	{
		$this->session->set_userdata([
			'publication' => $publication[0]->id,
			'teacher_classess' => $userData['classes'],
			'teacher_code' => $userData['teacher_code'],
			'status' => $userData['status'],
			'main_subject' => explode(',', $userData['subject'])[0],
			'board_name' => $userData['board_name'],
			'publication_name' => $publication[0]->name,
			'category' => $category[0]->id,
			'category_name' => $category[0]->name,
			'school_name' => $category[0]->school_name,
			'classes' => $this->AuthModel->classesx()[0]->id,
			'class_name' => $this->AuthModel->classesx()[0]->name,
			'selected_book' => $selectedBook->id,
		]);
	}

	function delete_record($table, $condColumn, $id)
	{
		$this->db->where($condColumn, $id);
		$res = $this->db->delete($table);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function user_profile()
	{
		$username = $this->session->userdata('ausername');
		if (!empty($username)) {
			$this->db->where('username', $username);
		}
		$result = $this->db->get('user')->result();
		if (!$result) {
			$this->error = $this->db->error();
			return FALSE;
		} else {
			return $result;
		}
	}

	public function salesman_profile()
	{

		$result = $this->db->get('salesman')->result();
		if (!$result) {
			$this->error = $this->db->error();
			return FALSE;
		} else {
			return $result;
		}
	}

	function update_school_logo($data, $username)
	{
		$this->db->where('username', $username);
		$this->db->set($data);
		$res = $this->db->update('user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_profile_logo($data, $username)
	{
		$this->db->where('email', $username);
		$this->db->set($data);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_user_profile($data, $username)
	{
		$this->db->where('username', $username);
		$this->db->set($data);
		$res = $this->db->update('user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_web_profile($data, $username)
	{
		$this->db->where('email', $username);
		$this->db->set($data);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function teacher_update_web_profile($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function teacher_remove_student($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_profile_account($data, $username)
	{
		$this->db->where('username', $username);
		$this->db->set($data);
		$res = $this->db->update('user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_web_account($data, $username)
	{
		$this->db->where('email', $username);
		$this->db->set($data);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// User Start  

	function user($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('user')->result();
		return $res;
	}

	function salesman($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('salesman')->result();
		return $res;
	}

	function content($name = null)
	{
		if (!empty($name)) {
			$this->db->where('name', $name);
		}
		$res = $this->db->get('web_content')->result();
		return $res;
	}

	function content_row($name = null)
	{
		if (!empty($name)) {
			$this->db->where('name', $name);
		}
		$res = $this->db->get('web_content')->row_array();
		return $res;
	}

	function check_boardName($bid)
	{
		if (!empty($bid)) {
			$this->db->where('id', $bid);
		}
		$res = $this->db->get('board')->result();
		return $res;
	}

	function check_pubName($pid)
	{
		if (!empty($pid)) {
			$this->db->where('id', $pid);
		}
		$res = $this->db->get('publication')->result();
		return $res;
	}

	public function dropdown_list($query)
	{
		$query = $this->db->query($query);
		return $query->result_array();
	}

	function check_catName($cid)
	{
		if (!empty($cid)) {
			$this->db->where('id', $cid);
		}
		$res = $this->db->get('category')->result();
		return $res;
	}

	function state($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('state')->result();
		return $res;
	}

	function ret_city($postData)
	{
		$response = array();
		$this->db->select('id,city_name');
		$this->db->where('state_id', $postData['id']);
		$q = $this->db->get('city');
		$response = $q->result_array();
		return $response;
	}

	function staten()
	{
		$this->db->where('zone', 'North');
		$res = $this->db->get('state')->result();
		return $res;
	}

	function statee()
	{
		$this->db->where('zone', 'East');
		$res = $this->db->get('state')->result();
		return $res;
	}

	function statew()
	{
		$this->db->where('zone', 'West');
		$res = $this->db->get('state')->result();
		return $res;
	}

	function states()
	{
		$this->db->where('zone', 'South');
		$res = $this->db->get('state')->result();
		return $res;
	}

	function create_user($data)
	{
		$res = $this->db->insert('user', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function create_salesman($data)
	{
		$res = $this->db->insert('salesman', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_user($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_salesman($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('salesman');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function retrive_user_update($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('user')->result();
		return $res;
	}

	function retrive_teacher_update($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	function retrive_teacher_update_row($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('web_user')->row();
		return $res;
	}

	function retrive_salesman_update($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('salesman')->result();
		return $res;
	}

	// user End
	// Content Start
	function cont($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('web_content')->result();
		return $res;
	}

	function create_con($data)
	{
		$res = $this->db->insert('web_content', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_con($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('web_content');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Permission End
	// Permission Start
	function permission($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('permission')->result();
		return $res;
	}

	function create_permission($data)
	{
		$res = $this->db->insert('permission', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_permission($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('permission');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Permission End

	// state Start
	function country($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('country')->result();
		return $res;
	}


	function stated($id = null)
	{
		if (!empty($id)) {
			$this->db->where('StateID', $id);
		}
		$res = $this->db->get('state')->result();
		return $res;
	}

	function get_statess($id = null)
	{
		//echo 'alert("'.$id.'")';
		if (!empty($id)) {
			$this->db->where('country_id', $id);
		}
		$res = $this->db->get('states')->result_array();
		return $res;
	}

	function create_state($data)
	{
		$res = $this->db->insert('state', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_state($details, $id)
	{
		$this->db->where('StateID', $id);
		$this->db->set($details);
		$res = $this->db->update('state');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// state End

	// state Start
	function citiesd($id = null)
	{
		$this->db->select('state.StateName as state_name');
		$this->db->select('city.*');
		$this->db->from('city as city');
		$this->db->join('state as state', 'city.state_id = state.StateID', 'INNER');
		$res = $this->db->get()->result();
		return $res;
	}

	function cities($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('city')->result();
		return $res;
	}

	function get_cities($id = null)
	{
		if (!empty($id)) {
			$this->db->where('state_id', $id);
		}
		$res = $this->db->get('cities')->result_array();
		return $res;
	}

	function create_city($data)
	{
		$res = $this->db->insert('city', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_city($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('city');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// state End

	// Web User Start  

	function webu($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$this->db->where('user_type', 'Student');
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	function webu_teacher($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$this->db->where('user_type', 'Teacher');
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	function update_webu($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('web_user');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// WEBU End
	// Board Start
	function board($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('board')->result();
		return $res;
	}

	function board_name($name = null)
	{
		if (!empty($name)) {
			$this->db->where('name', $name);
		}
		$res = $this->db->get('board')->result();
		return $res;
	}

	function create_board($data)
	{
		$res = $this->db->insert('board', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_board($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('board');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Board End
	// Publication Start
	function publication($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('publication')->result();
		return $res;
	}

	function create_publication($data)
	{
		$res = $this->db->insert('publication', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_publication($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('publication');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Publication End
	// Category Start
	function category($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		//$this->db->where('allow','Teacher');
		//$this->db->where('allow','Both');

		$this->db->order_by('orderb', 'asc');
		$res = $this->db->get('category')->result();
		return $res;
	}

	function categoryx_student()
	{
		//$this->db->where('allow','Student');
		$this->db->where('allow', 'Both');
		$this->db->order_by('orderb', 'asc');
		$res = $this->db->get('category')->result();
		return $res;
	}

	function create_category($data)
	{
		$res = $this->db->insert('category', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_category($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('category');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Category End
	// Main Subject Start
	function msubject($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('serial', 'asc');
		$res = $this->db->get('main_subject')->result();
		return $res;
	}
	// above function modified for to get list of subjects a teacher has taken
	function msubject_mod($id)
	{
		$sub_ids = explode(',', $id);
		$this->db->order_by('serial', 'asc');
		$this->db->or_where_in('id', $sub_ids);
		$res = $this->db->get('main_subject')->result();
		return $res;
	}

	function get_msubject($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('main_subject')->row_array();
		return $res;
	}

	function mcreate_subject($data)
	{
		$res = $this->db->insert('main_subject', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function mupdate_subject($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('main_subject');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Subject Start
	function subject($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('subject')->result();
		return $res;
	}

	function subject_name($id = null)
	{
		if (!empty($id)) {
			$this->db->where('board', $id);
			$this->db->or_where('board', 'All');
		}
		$res = $this->db->get('main_subject')->result();
		return $res;
	}

	function subjectr()
	{
		$this->db->select('main_subject.name as subsName');
		$this->db->select('subject.*');
		$this->db->from('subject as subject');
		$this->db->join('main_subject as main_subject', 'subject.sid=main_subject.id', 'INNER');
		$res = $this->db->get()->result();
		return $res;
	}

	function create_subject($data)
	{
		$res = $this->db->insert('subject', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_subject($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('subject');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Subject End

	// Series Start
	function series()
	{
		$this->db->select('main_subject.name as subsName');
		$this->db->select('series.*');
		$this->db->from('series as series');
		$this->db->join('main_subject as main_subject', 'series.main_subject_id=main_subject.id', 'INNER');
		$res = $this->db->get()->result();
		return $res;
	}
	function series_s($id = null)
	{
		if (isset($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('series')->result();
		return $res;
	}
	function create_series($data)
	{
		$res = $this->db->insert('series', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function update_series($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('series');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Classes Start
	function classes($id = null)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('class_position', 'asc');
		$res = $this->db->get('classes')->result();
		return $res;
	}

	function classes_teacher($id = null)
	{
		$class_id = explode(',', $id);
		$this->db->where_in('id', $class_id);

		$this->db->order_by('class_position', 'asc');
		$res = $this->db->get('classes')->result();

		//$this->db->last_query();

		return $res;
	}

	function classes_teacher_new($id = null, $teacher_code)
	{
		$class_id = explode(',', $id);
		$this->db->select('classes');
		$this->db->where_in('classes', $class_id);
		$this->db->where('stu_teacher_id', $teacher_code);
		$this->db->group_by('classes');
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	function classes_array()
	{

		$id = $this->session->userdata('teacher_classess');

		$class_id = explode(',', $id);
		$this->db->where_in('id', $class_id);

		$this->db->order_by('class_position', 'asc');
		$res = $this->db->get('classes')->result();

		return $res;
	}

	function classes_arraystudent()
	{

		$stud_cla_id = $this->session->userdata('classes');
		$this->db->where('id', $stud_cla_id);

		$this->db->order_by('class_position', 'asc');
		$res = $this->db->get('classes')->result();

		// $this->db->last_query();
		return $res;
	}


	function get_section_name($id)
	{
		$this->db->where('class_id', $id);
		$response = $this->db->get('class_section')->result_array();
		return $response;
	}

	function get_paper_mode($sid, $cid)
	{
		$this->db->select('paper_mode');
		$this->db->where('student_section', $sid);
		$this->db->where('student_class', $cid);
		$this->db->group_by(array('student_id', 'paper_mode'));
		$response = $this->db->get('paper_submision')->result_array();
		return $response;
	}

	function get_paper_marks($cid)
	{
		$this->db->select('question_type,marks');
		$this->db->where('class', $cid);
		$response = $this->db->get('touch_question')->result_array();
		return $response;
	}

	function get_paper_obtn_marks($sid, $mode)
	{
		$this->db->select_sum('ans_marks');
		$this->db->where('student_id', $sid);
		$this->db->where('paper_mode', $mode);
		$response = $this->db->get('paper_submision')->row();
		return $response;
	}
	function get_paper_obtn_marks_for_view($sid, $assign_id, $mode)
	{
		$this->db->select_sum('ans_marks');
		$this->db->where('student_id', $sid);
		$this->db->where('assign_id', $assign_id);
		$this->db->where('paper_mode', $mode);
		$response = $this->db->get('paper_submision')->row();
		return $response;
	}

	function get_section_class_paper($sid, $cid)
	{

		$this->db->select('web_user.fullname as name');
		$this->db->select('class_section.name as sectionName');
		$this->db->select('paper_submision.*');
		$this->db->from('paper_submision as paper_submision');
		$this->db->join('web_user as web_user', 'paper_submision.student_id=web_user.id', 'INNER');
		$this->db->join('class_section as class_section', 'paper_submision.student_section=class_section.id', 'INNER');
		$this->db->where('student_section', $sid);
		$this->db->where('student_class', $cid);
		$this->db->where('student_code', $this->session->userdata('teacher_code'));
		$this->db->group_by('student_id');
		$response = $this->db->get()->result_array();
		return $response;
	}

	function count_summative($sid, $cid)
	{
		$this->db->where('student_section', $sid);
		$this->db->where('student_class', $cid);
		$this->db->where('paper_mode', 'subjective');
		$response = $this->db->get('paper_submision')->num_rows();;
		return $response;
	}

	function count_objective($sid, $cid)
	{
		$this->db->where('student_section', $sid);
		$this->db->where('student_class', $cid);
		$this->db->where('paper_mode', 'objective');
		$response = $this->db->get('paper_submision')->num_rows();;
		return $response;
	}

	function sta_user()
	{
		$query = $this->db->query("SELECT * FROM web_user WHERE user_type = 'Student'");
		return $query->num_rows();
	}

	function tea_user()
	{
		$query = $this->db->query("SELECT * FROM web_user WHERE user_type = 'Teacher'");
		return $query->num_rows();
	}

	function sta_boards()
	{
		$this->db->select('COUNT(websupport.board) as total');
		$this->db->select('board.*');
		$this->db->from('board as board');
		$this->db->join('websupport as websupport', 'board.id=websupport.board', 'INNER');
		$this->db->group_by('board.id');
		$res = $this->db->get()->result();
		return $res;
	}

	function sta_pub()
	{
		$this->db->select('COUNT(websupport.publication) as total');
		$this->db->select('publication.*');
		$this->db->from('publication as publication');
		$this->db->join('websupport as websupport', 'publication.id=websupport.publication', 'INNER');
		$this->db->group_by('publication.id');
		$res = $this->db->get()->result();
		return $res;
	}

	function ret_r($postData)
	{
		$response = array();
		$this->db->select('COUNT(websupport.type) as total');
		$this->db->select('category.*');
		$this->db->from('category as category');
		$this->db->join('websupport as websupport', 'category.id=websupport.type', 'INNER');
		$this->db->group_by('category.id');
		$this->db->where('websupport.subject', $postData['id']);
		$response = $this->db->get()->result_array();
		return $response;
	}

	function sta_subject()
	{
		$query = $this->db->query('SELECT * FROM subject');
		return $query->num_rows();
	}

	function create_classes($data)
	{
		$res = $this->db->insert('classes', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function assigntest($id = null)
	{
		if (!empty($id)) {
			$this->db->where('teacher_code', $id);
		}
		$res = $this->db->get('paper_assign')->result();
		return $res;
	}

	function create_assigntest($data)
	{

		$res = $this->db->insert('paper_assign', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_assigntest_status($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('paper_assign');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function paper_submision($data)
	{
		$res = $this->db->insert('paper_submision', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function check_class_paper($class, $section, $teachercode, $date, $date2)
	{

		$this->db->where('class_name', $class);
		$this->db->where('section_name', $section);
		$this->db->where('teacher_code', $teachercode);
		$this->db->where('date_start >=', $date);
		$this->db->where('date_end <=', $date2);
		$this->db->where('status', '1');
		$res = $this->db->get('paper_assign')->result();
		if (!$res) {
			return FALSE;
		} else {
			return '1';
		}
	}

	// function check_subjective($class, $section, $teachercode, $date, $date2)
	// {
	// 	// $this->db->select('id');
	// 	$this->db->where('class_name', $class);
	// 	$this->db->where('section_name', $section);
	// 	$this->db->where('teacher_code', $teachercode);
	// 	$this->db->or_where_in('paper_mode', ['21', '22']);
	// 	// $this->db->like('paper_mode', 'subjective');
	// 	$this->db->where('date_start >=', $date);
	// 	$this->db->where('date_end <=', $date2);
	// 	$this->db->where('status', '1');
	// 	$res = $this->db->get('paper_assign')->row_array();

	// 	if (!$res) {
	// 		return FALSE;
	// 	} else {
	// 		return $res;
	// 	}
	// }
	function check_subjective($class, $section, $teachercode, $date, $date2, $paper_mode)
	{
		// $this->db->select('id');
		$this->db->where('class_name', $class);
		$this->db->where('section_name', $section);
		$this->db->where('teacher_code', $teachercode);
		$this->db->where('paper_mode', $paper_mode);
		// $this->db->like('paper_mode', 'subjective');
		$this->db->where('date_start >=', $date);
		$this->db->where('date_end <=', $date2);
		$this->db->where('status', '1');
		$res = $this->db->get('paper_assign')->row_array();

		if (!$res) {
			return FALSE;
		} else {
			return $res;
		}
	}

	function check_objective($class, $section, $teachercode, $date, $date2, $paper_mode)
	{

		// $this->db->select('id');
		$this->db->where('class_name', $class);
		$this->db->where('section_name', $section);
		$this->db->where('teacher_code', $teachercode);
		$this->db->where('paper_mode', $paper_mode);
		$this->db->where('date_start >=', $date);
		$this->db->where('date_end <=', $date2);
		$this->db->where('status', '1');
		$res = $this->db->get('paper_assign')->row_array();
		if (!$res) {
			return FALSE;
		} else {
			return $res;
		}
	}

	function check_subjective_submission($class, $section, $teachercode, $assignid, $paper_mode)
	{

		$this->db->where('assign_id', $assignid);
		$this->db->where('student_class', $class);
		$this->db->where('student_section', $section);
		$this->db->where('student_code', $teachercode);
		$this->db->where('paper_mode', $paper_mode);
		$res = $this->db->get('paper_submision')->row_array();
		if (!$res) {
			return '1';
		} else {
			return '0';
		}
	}

	function check_objective_submission($class, $section, $teachercode, $assignid, $paper_mode)
	{

		$this->db->where('assign_id', $assignid);
		$this->db->where('student_class', $class);
		$this->db->where('student_section', $section);
		$this->db->where('student_code', $teachercode);
		$this->db->where('paper_mode', $paper_mode);
		$res = $this->db->get('paper_submision')->row_array();
		if (!$res) {
			return '1';
		} else {
			return '0';
		}
	}

	function check_paper_summative($id)
	{

		$this->db->where('student_id', $id);
		$this->db->where('paper_mode', 'subjective');
		$res = $this->db->get('paper_submision')->result();
		if ($res->num_rows() == 1) {
			return '0';
		} else {
			return '1';
		}
	}

	function check_paper_objective($id)
	{
		$this->db->where('student_id', $id);
		$this->db->where('paper_mode', 'objective');
		$res = $this->db->get('paper_submision')->result();
		if ($res->num_rows() == 1) {
			return '0';
		} else {
			return '1';
		}
	}

	function classesSection()
	{
		$this->db->select('classes.name as className');
		$this->db->select('class_section.*');
		$this->db->from('class_section as class_section');
		$this->db->join('classes as classes', 'class_section.class_id=classes.id', 'INNER');
		$res = $this->db->get()->result();
		return $res;
	}


	function create_classesSection($data)
	{
		$res = $this->db->insert('class_section', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_classes($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('classes');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function update_classesSection($details, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($details);
		$res = $this->db->update('class_section');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Classes End
	// Support Start
	function support($id = null)
	{
		if (!empty($id)) {
			$this->db->select('board.name as boardName');
			$this->db->select('publication.name as publicationName');
			$this->db->select('subject.name as subjectName');
			$this->db->select('classes.name as className');
			$this->db->select('websupport.*');
			$this->db->from('websupport as websupport');
			$this->db->join('board as board', 'websupport.board=board.id', 'INNER');
			$this->db->join('publication as publication', 'websupport.publication=publication.id', 'INNER');
			$this->db->join('subject as subject', 'websupport.subject=subject.id', 'INNER');
			$this->db->join('classes as classes', 'websupport.classes=classes.id', 'INNER');
			$this->db->where('websupport.type', $id);
		}
		$res = $this->db->get()->result();
		return $res;
	}

	function supportt($id = null)
	{
		if (!empty($id)) {
			$this->db->select('board.name as boardName');
			$this->db->select('publication.name as publicationName');
			$this->db->select('subject.name as subjectName');
			$this->db->select('msubject.name as msubjectName');
			$this->db->select('classes.name as className');
			$this->db->select('websupport.*');
			$this->db->from('websupport as websupport');
			$this->db->join('board as board', 'websupport.board=board.id', 'INNER');
			$this->db->join('publication as publication', 'websupport.publication=publication.id', 'INNER');
			$this->db->join('subject as subject', 'websupport.subject=subject.id', 'INNER');
			$this->db->join('main_subject as msubject', 'websupport.msubject=msubject.id', 'INNER');
			$this->db->join('classes as classes', 'websupport.classes=classes.id', 'INNER');
			$this->db->where('websupport.id', $id);
		}
		$res = $this->db->get()->result();
		return $res;
	}

	function addSupport($data)
	{
		$res = $this->db->insert('websupport', $data);
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function retrive_support_update($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		$res = $this->db->get('websupport')->result();
		return $res;
	}

	function update_support($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$res = $this->db->update('websupport');
		if (!$res) {
			$this->error = $this->db->error()['message'];
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function default_product()
	{
		if ($this->session->userdata('board_name') == 'CBSE') {
			$board = array('1', '3');
		} elseif ($this->session->userdata('board_name') == 'ICSE') {
			$board = array('2', '3');
		} else {
			$board = array('3');
		}
		// $this->db->or_where_in('board', $board);
		// $this->db->where('publication', $this->session->userdata('publication'));
		$this->db->where('classes', $this->session->userdata('classes'));
		$this->db->where('msubject', $this->session->userdata('main_subject'));
		// $this->db->where('type', $this->session->userdata('category'));
		// $this->db->where('subject', $this->session->userdata('selected_book'));
		$query = $this->db->get('websupport')->result();

		// echo $this->db->last_query();
		return $query;
	}

	function get_sub($postData)
	{
		$response = array();
		$this->db->distinct();
		$this->db->select('main_subject.name as subjectName');
		$this->db->select('websupport.msubject as subjectId');
		$this->db->from('websupport as websupport');
		$this->db->join('main_subject as main_subject', 'websupport.msubject=main_subject.id', 'INNER');
		$this->db->where('websupport.board', $postData['bid']);
		$this->db->where('websupport.publication', $postData['pid']);
		$this->db->where('websupport.classes', $postData['cid']);
		$this->db->where('websupport.msubject', $postData['mid']);
		$response = $this->db->get()->result_array();
		return $response;
	}

	function get_subr($postData)
	{
		$response = array();
		$this->db->distinct();
		$this->db->select('main_subject.name as subjectName');
		$this->db->select('websupport.msubject as subjectId');
		$this->db->from('websupport as websupport');
		$this->db->join('main_subject as main_subject', 'websupport.msubject=main_subject.id', 'INNER');
		$this->db->where('websupport.board', $postData['bid']);
		$this->db->where('websupport.publication', $postData['pid']);
		$this->db->where('websupport.classes', $postData['cid']);
		$this->db->where('websupport.msubject', $postData['sid']);
		$response = $this->db->get()->result_array();
		return $response;
	}

	function get_subm($postData)
	{
		$response = array();
		$this->db->where('sid', $postData['bid']);
		$res = $this->db->get('subject')->result();
		return $res;
	}

	function get_techrefsubs($postData)
	{
		$response = array();
		$this->db->where('board_id', $postData['id']);
		$res = $this->db->get('main_subject')->result();
		return $res;
	}

	function get_subs($postData)
	{
		$response = array();
		$this->db->distinct();
		$this->db->select('subject.name as subjectName');
		$this->db->select('websupport.subject as subjectId');
		$this->db->from('websupport as websupport');
		$this->db->join('subject as subject', 'websupport.subject=subject.id', 'INNER');
		$this->db->where('websupport.classes', $postData['id']);
		$response = $this->db->get()->result_array();
		return $response;
	}

	function sub_ch()
	{
		$this->db->select('COUNT(websupport.subject) as total');
		$this->db->select('category.name as catName');
		$this->db->select('subject.name as subName');
		$this->db->from('websupport as websupport');
		$this->db->join('subject as subject', 'subject.id=websupport.subject', 'INNER');
		$this->db->join('category as category', 'category.id=websupport.type', 'INNER');
		$this->db->group_by('subject.id,category.id');
		$res = $this->db->get()->result();
		return $res;
	}

	function get_all_teacherdata()
	{
		$this->db->select('state.StateName as statename');
		$this->db->select('subject.name as subName');
		$this->db->select('web_user.*');
		$this->db->from('web_user as web_user');
		$this->db->join('state as state', 'state.StateID = web_user.state', 'LEFT');
		$this->db->join('subject as subject', 'subject.sid = web_user.subject', 'LEFT');
		$this->db->where('web_user.user_type', 'Teacher');
		$this->db->group_by('web_user.id');
		$this->db->order_by('web_user.id', 'DESC');
		$res = $this->db->get()->result();

		return $res;
	}

	function get_all_studentdata()
	{
		$this->db->distinct();
		$this->db->select('state.StateName as statename');
		$this->db->select('subject.name as subName');
		$this->db->select('web_user.*');
		$this->db->from('web_user as web_user');
		$this->db->join('state as state', 'state.StateID = web_user.state', 'LEFT');
		$this->db->join('subject as subject', 'subject.sid = web_user.subject', 'LEFT');
		$this->db->where('web_user.user_type', 'Student');
		$this->db->group_by('web_user.id');
		$this->db->order_by('web_user.id', 'DESC');
		$res = $this->db->get()->result();

		return $res;
	}

	function teacher_student()
	{ //stu_teacher_id  //teacher_code
		$this->db->where('stu_teacher_id', $this->session->userdata('teacher_code'));
		$res = $this->db->get('web_user')->result();
		// get section name instead of id
		foreach ($res as $re) {
			$this->db->where('id', $re->class_section);
			$sec_row = $this->db->get('class_section')->row();
			$re->class_section = $sec_row->name;
		}
		return $res;
	}

	function student_teacher()
	{ //stu_teacher_id  //teacher_code
		$this->db->where('teacher_code', $this->session->userdata('stu_teacher_id'));
		$res = $this->db->get('web_user')->result();
		return $res;
	}

	// Support End

	#mod
	// function selectable_classes($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$classesArr = explode(',', $this->db->get('main_subject')->row()->classes);
	// 	$this->db->or_where_in('id', $classesArr);
	// 	$res = $this->db->get('classes')->result();
	// 	return $res;
	// }
	function selectable_classes($msubject_id, $user_id)
	{
		$this->db->where('id', $user_id);
		$user_row = $this->db->get('web_user')->row();
		if (!$user_row->series_classes) {
			// return user classes if user doesn't have series classes in new format
			$classesArr = explode(',', $user_row->classes);
		} else {
			// return user series classes if user has series classes in new format
			$series_classes =  unserialize($user_row->series_classes);
			// echo '<pre>', var_dump($series_classes), '</pre><br>';
			// exit;

			$classesArr = array();
			foreach ($series_classes[$msubject_id] as $classes_array) {
				// echo '<pre>', var_dump($classes_array), '</pre><br>';
				// exit;
				$classesArr = array_merge($classesArr, $classes_array);
			}
			$classesArr = array_unique($classesArr);
		}
		// $classesArr = explode(',', $this->db->get('main_subject')->row()->classes);
		// $this->db->or_where_in('id', $classesArr);
		// $res = $this->db->get('classes')->result();
		// return $res;
		// } else {
		// 	// return all classes of selected subject
		// 	$this->db->where('id', $msubject_id);
		// 	$classesArr = explode(',', $this->db->get('main_subject')->row()->classes);
		// }
		// echo '<pre>', var_dump($classesArr), '</pre>';
		// exit;
		$this->db->or_where_in('id', $classesArr);
		$res = $this->db->get('classes')->result();
		return $res;
	}

	function selectable_books($sid, $class_ID)
	{
		# modified to check for series
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id', $user_id);
		$user_row = $this->db->get('web_user')->row();
		// var_dump(boolval($user_row->series_classes));
		if (boolval($user_row->series_classes)) {
			$user_series_classes = unserialize($user_row->series_classes);
			$user_series_arr = array();
			foreach ($user_series_classes[$sid] as $series_id => $series_class) {
				array_push($user_series_arr, $series_id);
				// echo '<pre>', var_dump($series_id), '</pre>';
			}
			// exit();
			$this->db->where_in('series_id', $user_series_arr);
		}
		$this->db->where(['sid' => $sid, 'class' => $class_ID]);
		$res = $this->db->get('subject')->result();
		// $res = explode(',', $this->db->get('main_subject')->row()->classes);
		// 
		return $res;
	}

	function get_categories($id)
	{
		$this->db->where('id', $id);
		$cat = $this->db->get('subject')->row()->categories;
		$this->db->or_where_in('id', explode(',', $cat));
		// $this->db->or_where_in('allow', ['Both', 'Teacher']);
		// $this->db->order_by('orderb', 'asc');
		$res = $this->db->get('category')->result();
		return $res;
	}
	####

	// get all class_section in associative array
	function class_section_array()
	{
		$all_class_section = $this->db->get('class_section')->result();
		$cl_sec_arr = array();
		foreach ($all_class_section as $section) {
			$cl_sec_arr += [$section->id => array()];
			$cl_sec_arr[$section->id] = $section->name;
		}
		return $cl_sec_arr;
	}
	// get books along with their questions
	function book_questions()
	{
		$books = $this->db->get('subject')->result();
		$books_data = array();
		foreach ($books as $book) {
			$this->db->where('book_id', $book->id);
			$book_questions = $this->db->get('touch_question')->result(); // get all questions of current book
			$objective_test_1 = 0;
			$objective_test_2 = 0;
			$objective_test_3 = 0;
			$objective_test_4 = 0;
			$subjective_test_1 = 0;
			$subjective_test_2 = 0;
			if (count($book_questions)) {
				foreach ($book_questions as $que) {
					switch ($que->question_type) {
						case 11:
							++$objective_test_1;
							break;
						case 12:
							++$objective_test_2;
							break;
						case 13:
							++$objective_test_3;
							break;
						case 14:
							++$objective_test_4;
							break;
						case 21:
							++$subjective_test_1;
							break;
						case 22:
							++$subjective_test_2;
							break;
						default:
							break;
					}
				}
			}
			$books_data += [
				$book->id => [
					'book_name' => $book->name,
					'objective_test_1' => $objective_test_1,
					'objective_test_2' => $objective_test_2,
					'objective_test_3' => $objective_test_3,
					'objective_test_4' => $objective_test_4,
					'subjective_test_1' => $subjective_test_1,
					'subjective_test_2' => $subjective_test_2,
				]
			];
		}
		return $books_data;
	}
	public function get_paper_set($class, $series, $type)
	{
		$this->db->where('class', $class);
		$this->db->where('series', $series);
		$this->db->where('type', $type);
		$res = $this->db->get('paper_set')->row();
		return $res;
	}

	#mod
	// Returns complete data of teacher's series
	function selectable_main_subjects($user_id)
	{
		$this->db->where('id', $user_id);
		$user = $this->db->get('web_user')->row();
		//subject ids of subjects that user has selected
		$user_mainsub_id_arr = explode(',', $user->subject);
		$this->db->or_where_in('id', $user_mainsub_id_arr);
		$this->db->order_by('serial', 'asc');
		$res = $this->db->get('main_subject')->result();
		return $res;
	}
	// Returns teacher all subject's series
	// Returns associative array of series as keys and subject-series as values
	function selectable_subject_series($user_id)
	{
		$this->db->where('id', $user_id);
		$user = $this->db->get('web_user')->row();
		//subject ids of subjects that user has selected
		$user_mainsub_id_arr = explode(',', $user->subject);
		$this->db->or_where_in('main_subject_id', $user_mainsub_id_arr);
		$this->db->order_by('name', 'asc');
		$series_s = $this->db->get('series')->result();
		$res = array();
		foreach ($user_mainsub_id_arr as $main_subject_id) {
			$res[$main_subject_id] = array();
			foreach ($series_s as $series) {
				if ($series->main_subject_id == $main_subject_id) {
					// array_push($res[$main_subject_id][$series->id], $series->name);
					$res[$main_subject_id][$series->id] = $series->name;
				}
			}
		}
		return $res;
	}
	// Returns teacher selected subject's series
	// Returns associative array of series as keys and subject_series_id as value
	public function teacher_subject_series($user_id)
	{
		$this->db->where('id', $user_id);
		$user = $this->db->get('web_user')->row();
		if (!isset($user->series_classes)) return null;
		$series_classes = unserialize($user->series_classes);
		$res = array();
		foreach ($series_classes as $key => $series_classe) {
			$res[$key] = $series_classe[0][0];
		}
		return $res;
	}
	// Get Series Classes of a Teacher
	// Returns associative array of series as keys and selected classes as values
	function get_teacher_series_classes($user_id)
	{
		$this->db->where('id', $user_id);
		$user_row = $this->db->get('web_user')->row();
		if (!$user_row->series_classes) return null;
		$series_classes =  unserialize($user_row->series_classes);
		$res = array();
		foreach ($series_classes as $key => $series_classe) {
			$res[$key] = $series_classe[0][1];
		}
		return $res;
	}
	// Get Series of a Teacher
	// Returns array of series(ids), selected by teacher
	function get_teacher_series($user_id)
	{
		$this->db->where('id', $user_id);
		$user_row = $this->db->get('web_user')->row();
		if (!$user_row->series_classes) return null;
		$data =  unserialize($user_row->series_classes);
		return array_keys($data);
		// return $data;
	}
	// Get Classes from selected Series of a Teacher
	// Returns array of classes(ids) of a series
	function get_teacher_classes($user_id, $series_id)
	{
		$this->db->where('id', $user_id);
		$user_row = $this->db->get('web_user')->row();
		if (!$user_row->series_classes) {
			// return user classes if user doesn't have series classes in new format
			$classes = explode(',', $user_row->classes);
			return $classes;
		}
		$data =  unserialize($user_row->series_classes);
		return $data[$series_id][0][1];
		// return $data;
	}
	# teacher update section
	// returns associative array, where keys = msubject_id & values = all classes of that msubject
	function get_series_all_classes($main_sub)
	{
		$res = array();
		foreach ($main_sub as $msub_id) {
			$this->db->where('id', $msub_id);
			// $this->db->order_by('class', 'asc');
			$books = $this->db->get('main_subject')->result();
			// $res[$msub_id] = array();
			foreach ($books as $book) {
				#mod to get all class info
				$book_class_arr = explode(',', $book->classes);
				$this->db->where_in('id', $book_class_arr);
				$classes = $this->db->get('classes')->result();
				$res[$msub_id] = $classes;
				// array_push($res[$msub_id], $classes);
			}
		}
		return $res;
	}
	// returns associative array, where keys = msubject_id & values = msubject_name
	function get_main_subjects_arr()
	{
		$res = array();
		$main_subjects = $this->db->get('main_subject')->result();
		foreach ($main_subjects as $main_subject) {
			$res[$main_subject->id] = $main_subject->name;
		}
		return $res;
	}

	// returns associative array, where keys = msubject_id & values = msubject_name
	function get_series_arr()
	{
		$res = array();
		$main_subjects = $this->db->get('series')->result();
		foreach ($main_subjects as $main_subject) {
			$res[$main_subject->id] = $main_subject->name;
		}
		return $res;
	}
	#mod

	function all_states()
	{
		$res = $this->db->get('state')->result();
		return $res;
	}

	function getStates()
	{
		$res = $this->db
			->get('states')
			->result();

		return $res;
	}

	function getCities($stateID)
	{
		$res = $this->db
			->where('state_id', $stateID)
			->get('cities')
			->result();

		return $res;
	}

	function addWebUser($data)
	{
		$res = $this->db
			->insert('web_user', $data);

		return $res;
	}

	/**
	 * Generic method to retrieve user-associated items
	 *
	 * @param string $userTableName The name of the junction table (e.g., 'web_user_books')
	 * @param string $itemTableName The name of the target table (e.g., 'books')
	 * @param string $foreignKeyField The foreign key field in the junction table (e.g., 'book_id')
	 * @return array The list of items associated with the current user
	 */
	private function getUserItems($userTableName, $itemTableName, $foreignKeyField)
	{
		$userId = $this->getCurrentUserID();

		// Return empty array if no user ID
		if (!$userId) {
			return [];
		}

		$itemIds = $this->db
			->where('web_user_id', $userId)
			->select($foreignKeyField)
			->get($userTableName)
			->result();

		$itemIdsArr = array_map(function ($item) use ($foreignKeyField) {
			return $item->$foreignKeyField;
		}, $itemIds);

		// If no item IDs, return empty array
		if (empty($itemIdsArr)) {
			return [];
		}

		$items = $this->db
			->where_in('id', $itemIdsArr)
			->get($itemTableName)
			->result();

		return $items;
	}

	public function selectableSeries()
	{
		return $this->getUserItems('web_user_series', 'series', 'series_id');
	}

	public function selectableSubjects()
	{
		return $this->getUserItems('web_user_subjects', 'main_subject', 'main_subject_id');
	}

	public function selectableBooks()
	{
		return $this->getUserItems('web_user_books', 'subject', 'book_id');
	}

	public function selectableCategories($bookId = null)
	{
		if (!$bookId) $bookId = $this->selectableBooks()[0]->id;

		$book = $this->db
			->where('id', $bookId)
			->get('subject')
			->row();

		$bookCategoriesArr = explode(',', $book->categories);
		$res = $this->db
			->where_in('id', $bookCategoriesArr)
			->order_by('orderb', 'ASC')
			->get('category')
			->result();

		return $res;
	}

	public function getCurrentUserID()
	{
		$userId = $this->session->userdata('user_id');

		// Make sure user ID exists
		if (!$userId) return false;

		return $userId;
	}

	public function webUserContents($bookId = null, $categoryId = null)
	{
		if (!$bookId) $bookId = $this->selectableBooks()[0]->id;
		if (!$categoryId) $categoryId = $this->selectableCategories($bookId)[0]->id;

		$res = $this->db
			->where('subject', $bookId)
			->where('type', $categoryId)
			->order_by('title', 'ASC')
			->get('websupport')
			->result();

		return $res;
	}

	public function updateSessionSelection($subjectId = null, $bookId = null, $categoryId = null)
	{
		if (!$subjectId) $subjectId = $this->selectableSubjects()[0]->id;
		if (!$bookId) $bookId = $this->selectableBooks()[0]->id;
		if (!$categoryId) $categoryId = $this->selectableCategories($bookId)[0]->id;

		// $this->session->set_userdata('selectedSeries', $seriesId);
		$this->session->set_userdata('selectedSubject', $subjectId);
		$this->session->set_userdata('selectedBook', $bookId);
		$this->session->set_userdata('selectedCategory', $categoryId);
	}

	public function isSeriesAssgined()
	{
		$userId = $this->session->userdata('user_id');
		$res = $this->db
			->where('web_user_id', $userId)
			->get('web_user_series')
			->row();

		return (bool)$res;
	}
}
