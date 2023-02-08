<?php  
Class About_us extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		
		$this->data['temp'] = 'site/about-us/index';
		$this->load->view('site/about-us/layout', $this->data);
	}
}