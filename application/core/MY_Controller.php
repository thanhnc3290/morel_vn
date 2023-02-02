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
		$this->load->model('catalog_model');
		$this->load->model('product_model');
		$this->load->model('product_technology_model');


		//Kiểm tra catalog có danh mục con hay không - nếu có thì gọi ra, kiểm tra và sắp xếp
		$input_catalog = array();
		$input_catalog['where'] = array('parent_id' => '0'); // Định nghĩa là dạng danh mục nội dung
		$input_catalog['order'] = array('sort_order','asc');
		$this->db->select('id, name, alias, parent_id, status, sort_order, meta_desc, meta_key, social_image_link, redirect_link');
		$catalog_list = $this->catalog_model->get_list($input_catalog);
		foreach ($catalog_list as $row)
		{
			$input['where'] = array('parent_id' => $row->id);
			$input['order'] = array('sort_order','asc');
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;

			foreach($subs as $subs)
			{
				$input_subs['where'] = array('parent_id' => $subs->id);
				$input_subs['order'] = array('sort_order','asc');
				$subss = $this->catalog_model->get_list($input_subs);
				$subs->subss = $subss;
			}
		}
		$this->data['catalog_list'] = $catalog_list; 

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
				$json_base_url = str_replace('/','\/',base_url());
				$this->data['json_base_url'] = $json_base_url;
				
				$site_info = $this->site_info_model->get_info('1');
				$this->data['site_info'] = $site_info;

				
							 


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