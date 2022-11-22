<?php 
Class MY_Controller extends CI_Controller
{
	// Biến gửi dữ liệu sang Views
	public $data=array();
	
	function __construct()
	{
		// Kế thừa từ CI_Controller
		parent::__construct();
		
		$this->load->model('admin_model');
		$this->load->model('site_info_model');

		$controller =$this->uri->segment(1);
		switch ($controller)
		{
			case 'admin' :
			{
				// Xử lý thông tin khi truy cập trang Admin
				$this->load->helper('admin');
				$this->_check_login();
				break;
			}

			default:
			{
				

					
							 


			}
		}

		
				
	}

	




	/*
	 * Kiểm tra trạng thái đăng nhập của Admin
	 */

	private function _check_login()
	{
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);

		$login = $this->session->userdata('login');
		// Nếu chưa đăng nhập mà truy cập vào controller khác 'login' thì chuyển về trang login
		if(!$login && $controller !='login')
		{
			redirect(admin_url('login'));
		}
		// Nếu đã đăng nhập thì không cho chuyển về trang login nữa
		if($login && $controller =='login')
		{
			redirect(admin_url('home'));
		}
	}
}