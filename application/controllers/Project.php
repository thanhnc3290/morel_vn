<?php  
Class Project extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('site_info_model');
        $this->load->model('project_model');
	}

    function index(){
		$input              = array();
        $input['where']     = array('status' => '0');
        $this->db->select('id, name, alias, image_link, meta_desc');
        $list   = $this->project_model->get_list($input);
        $this->data['list'] = $list;
 		
        $this->data['temp'] = 'site/project/index';
		$this->load->view('site/project/layout', $this->data);
    }

    function view(){
        //Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$info = $this->project_model->get_info($id);
		if(!$info) redirect();
        if($info->status !== '0') {redirect();}

		$this->data['id'] = $id;
		$this->data['info'] = $info;

        $this->data['temp'] = 'site/project/view';
		$this->load->view('site/project/layout_view', $this->data);
    }
	
}