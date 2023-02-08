<?php  
Class Catalog extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('site_info_model');
		$this->load->model('catalog_model');
        $this->load->model('product_model');
	}

    function catalog(){
		//Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$info = $this->catalog_model->get_info($id);
		if(!$info) redirect();
        if($info->status !== '0') {redirect();}

		$this->data['id'] = $id;
		$this->data['info'] = $info;

		//lấy tất cả danh mục con của danh mục hiện tại
		$input_subs_catalog_list 			= array();
		$input_subs_catalog_list['where']	= array('status' => '0', 'parent_id' => $id);
		$input_subs_catalog_list['order']	= array('sort_order','asc');
		$this->db->select('id, name, alias, social_image_link, meta_desc, redirect_link');
		$subs_catalog_list = $this->catalog_model->get_list($input_subs_catalog_list);
		$this->data['subs_catalog_list'] 	= $subs_catalog_list;

		//Lấy sản phẩm thuộc danh mục hiện tại
		$input_product_list 				= array();
		$input_product_list['where']		= array('status' => '0', 'catalog_id' => $id);
		$input_product_list['order']		= array('id','desc');
		$this->db->select('id, name, alias, image_link, meta_desc');
		$product_list = $this->product_model->get_list($input_product_list);
		$this->data['product_list']			= $product_list;
 		
        $this->data['temp'] = 'site/catalog/catalog';
		$this->load->view('site/catalog/layout', $this->data);
    }
	
}