<?php  
Class Technology extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		
		$this->data['temp'] = 'site/technology/index';
		$this->load->view('site/technology/layout', $this->data);
	}
}