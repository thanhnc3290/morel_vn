<?php
Class Home extends MY_Controller
{
	function __construct()
	{
		// Kế thừa từ MY_Controller
		parent::__construct();

		$this->load->model('admin_model');
		$this->load->model('site_info_model');

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
		$this->data['admin_login_id'] = $admin_login_id; 
	}
	
	function index()
	{
		$this->data['temp']='admin/home/index';
		$this->load->view('admin/main', $this->data);
	}
}