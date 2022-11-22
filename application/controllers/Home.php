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
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}

	function error(){
		$this->data['temp'] = 'site/home/404';
		$this->load->view('site/layout', $this->data);
	}

}