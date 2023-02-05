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
        if(!$info->status > '0') redirect();

		$this->data['id'] = $id;
		$this->data['info'] = $info;

		$url_of_this_info = base_url('product-category/'.$info->alias.'-c'.$info->id);
		$this->data['url_of_this_info'] = $url_of_this_info;

        $show_product = '0';
        if($info->parent_id > '0'){
            $show_product = '1'; // không show product -- show catalog con
        }else{
            //không show catalog - show tất cả sản phẩm con
        }
        $this->data['show_product'] = $show_product;

        $this->data['temp'] = 'site/catalog/catalog';
		$this->load->view('site/catalog/layout', $this->data);
    }
	
}