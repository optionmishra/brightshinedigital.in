<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Analytics extends CI_Controller
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
		$this->load->model('AnalyticsModel');
		$this->load->model('DataTableModel');
		$this->siteName = 'Admin Panel';
	}


	private function is_admin_login()
	{
		if (!$this->session->userdata('ausername')) {
			header("location:" . base_url('admin/login'));
		}
	}

	private function is_user_login()
	{
		if (!$this->session->userdata('username')) {
			header("location:" . base_url());
		}
	}

	function analytics()
	{
		$this->is_admin_login();
		if ($this->session->userdata('level') == 'Super Admin') {
			$cat = $this->AuthModel->category();
			$data = [
				'title' => 'Analytics',
				'page' => 'Analytics',
				'row' => $this->AuthModel->user_profile(),
				'cat' => $cat,
				'permissions' => $this->AuthModel->permission(),
				'recently_uploaded_websupport' => $this->AnalyticsModel->recently_uploaded_websupport(),
				'recently_downloaded_websupport' => $this->AnalyticsModel->recently_downloaded_websupport(),
				// 'category_wise_download_data' => $this->AnalyticsModel->category_wise_download_data($cat),
				'siteName' => $this->siteName
			];
			$this->load->view('globals/header', $data);
			$this->AuthModel->navbar();
			$this->load->view('superadmin/analytics', $data);
			$this->load->view('globals/footer', $data);
		} else {
			header("location:" . base_url('admin/login'));
		}
	}

	function download_websupport($id)
	{
		// echo '<pre>', var_dump($this->session->userdata('user_id')), '</pre>';
		// exit;
		$this->is_user_login();
		$this->db->where('id', $id);
		$websupport = $this->db->get('websupport')->row();

		$data = [
			'user_id' => $this->session->userdata('user_id'),
			'websupport_id' => $id,
		];
		$this->db->insert('websupport_downloads_tracking', $data);

		if ($websupport->file_url === null || $websupport->file_url === '') {
			return redirect("/assets/files/$websupport->file_name");
		}
		return redirect($websupport->file_url);
		// echo '<pre>', var_dump($this->db->get('websupport')->row()),'</pre>';	
	}


	function getLists()
	{
		$data = $row = array();

		// Fetch member's records
		$memData = $this->DataTableModel->getRows($_POST);

		$i = $_POST['start'];
		foreach ($memData as $member) {
			$i++;
			// $created = date('jS M Y', strtotime($member->created));
			// $status = ($member->status == 1) ? 'Active' : 'Inactive';
			$data[] = array($i, $member->title, $member->email, $member->downloaded_at);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->DataTableModel->countAll(),
			"recordsFiltered" => $this->DataTableModel->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}


	function getCategoryAnalytics()
	{
		$data = $row = array();
		$category_id = $this->input->post('categoryID');

		// Fetch member's records
		$memData = $this->DataTableModel->getRows($_POST);

		$i = $_POST['start'];
		foreach ($memData as $member) {
			$i++;
			// $created = date('jS M Y', strtotime($member->created));
			// $status = ($member->status == 1) ? 'Active' : 'Inactive';
			$data[] = array($i, $member->class_name, $member->subject_name, $member->title, $member->downloads);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->DataTableModel->countAll(),
			"recordsFiltered" => $this->DataTableModel->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);

		// // Encode the data as JSON
		// $json_output = json_encode($output);

		// // Set appropriate headers
		// $this->output
		// 	->set_content_type('application/json')
		// 	->set_output($json_output);
	}
}
