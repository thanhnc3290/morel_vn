<?php  
Class Product extends MY_Controller
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

	function index(){
		$this->data['temp'] = 'site/product/index';
		$this->load->view('site/product/layout_index', $this->data);
	}

    function product(){
		//Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$this->db->where_in('status', 0);
		$info = $this->product_model->get_info($id);
		if(!$info) redirect();

		$this->data['id'] = $id;
		$this->data['info'] = $info;

		$url_of_this_info = base_url('product/'.$info->alias.'-p'.$info->id);
		$this->data['url_of_this_info'] = $url_of_this_info;

		$catalog_of_this_info = $this->catalog_model->get_info($info->catalog_id);
		$this->data['catalog_of_this_info'] = $catalog_of_this_info;
		if($catalog_of_this_info->parent_id > '0'){
			$parent_catalog_of_this_info_1 = $this->catalog_model->get_info($catalog_of_this_info->parent_id);
			if(isset($parent_catalog_of_this_info_1)){
				$this->data['parent_catalog_of_this_info_1'] = $parent_catalog_of_this_info_1;

				if($parent_catalog_of_this_info_1->parent_id > '0'){
					$parent_catalog_of_this_info_2 = $this->catalog_model->get_info($parent_catalog_of_this_info_1->parent_id);
					if(isset($parent_catalog_of_this_info_2)){
						$this->data['parent_catalog_of_this_info_2'] = $parent_catalog_of_this_info_2;
					}
				}
			} 
		}

		$input_component_list 			= array();
		$input_component_list['where'] 	= array('status' => '0','catalog_id'=> $info->catalog_id);
		$input_component_list['order']	= array('id','desc');
		$input_component_list['limit']	= array('4','0');
		$this->db->select('id, name, alias, image_link');
		$component_list = $this->product_model->get_list($input_component_list);
		$this->data['component_list'] = $component_list;

		if($info->layout_type == '0'){
			$this->data['temp'] = 'site/product/product';
			$this->load->view('site/product/layout', $this->data);
		}	

		if($info->layout_type == '1'){
			$this->data['temp'] = 'site/product/product';
			$this->load->view('site/product/layout', $this->data);
		}	

		if($info->layout_type == '2'){
			$this->data['temp'] = 'site/product/product_2';
			$this->load->view('site/product/layout_2', $this->data);
		}	
    }
	
}