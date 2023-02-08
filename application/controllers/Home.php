<?php  
Class Home extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
	}

 
	function index(){
		$input_project = array();
		$input_project['where']		= array('status' => '0');
		$input_project['order']		= array('sort_order','asc');
		$input_project['limit']		= array('5','0');
		$this->db->select('id, name, alias, image_link, meta_desc');
		$project_list	= $this->project_model->get_list($input_project);
		$this->data['project_list'] = $project_list;


		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}

	function error(){
		$this->data['temp'] = 'site/home/404';
		$this->load->view('site/layout', $this->data);
	}

}