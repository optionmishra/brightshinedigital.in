<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AnalyticsModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function recently_uploaded_websupport()
	{
		$this->db->limit(10);
		$this->db->order_by('date', 'desc');
		return $this->db->get('websupport')->result();
	}
	function recently_downloaded_websupport()
	{
		$this->db->limit(10);
		// $this->db->select('*');
		$this->db->select(['title', 'email', 'fullname']);
		$this->db->select('websupport.subject as websupport_subject');
		$this->db->select('websupport_downloads_tracking.date as downloaded_at');
		$this->db->order_by('downloaded_at', 'desc');
		$this->db->from('websupport_downloads_tracking');
		$this->db->join('websupport', 'websupport.id = websupport_downloads_tracking.websupport_id');
		$this->db->join('web_user', 'web_user.id = websupport_downloads_tracking.user_id');
		// $query = $this->db->get();
		return $this->db->get()->result();
	}

	// function category_wise_download_data($categories)
	// {
	// 	$category_wise_download_data = array();
	// 	foreach ($categories as $cat) {
	// 		$this->db->select(['title', 'email', 'fullname', 'type', 'websupport_id']);
	// 		$this->db->select('COUNT(websupport_id) as downloads');
	// 		$this->db->select('websupport.subject as websupport_subject');
	// 		$this->db->select('websupport_downloads_tracking.date as downloaded_at');
	// 		$this->db->select('classes.name as class_name');
	// 		$this->db->select('main_subject.name as subject_name');

	// 		$this->db->order_by('downloaded_at', 'desc');
	// 		$this->db->from('websupport_downloads_tracking');

	// 		$this->db->join('websupport', 'websupport.id = websupport_downloads_tracking.websupport_id');
	// 		$this->db->join('web_user', 'web_user.id = websupport_downloads_tracking.user_id');
	// 		$this->db->join('classes', 'websupport.classes = classes.id');
	// 		$this->db->join('main_subject', 'websupport.msubject = main_subject.id');

	// 		$this->db->where('type', $cat->id);
	// 		$this->db->group_by('websupport_id');
	// 		$category_wise_download_data[$cat->id] = $this->db->get()->result();
	// 	}
	// 	return $category_wise_download_data;
	// }
}
