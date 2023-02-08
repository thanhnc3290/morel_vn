<?php  
Class Blog extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');

		
		$input_news_list 			= array();
		$input_news_list['where']	= array('status' => '0');
		$input_news_list['order']	= array('id','desc');
		$this->db->select('id, name, alias, image_link, meta_desc');
		$list = $this->news_model->get_list($input_news_list);
		$this->data['list'] = $list;
	}

	function index(){
		
		$this->data['temp'] = 'site/blog/index';
		$this->load->view('site/blog/layout', $this->data);
	}

	function view(){
		//Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$this->db->where_in('status', 0);
		$info = $this->news_model->get_info($id);
		if(!$info) redirect();

		$this->data['id'] = $id;
		$this->data['info'] = $info;

		$this->data['temp'] = 'site/blog/view';
		$this->load->view('site/blog/layout', $this->data);
	}
}