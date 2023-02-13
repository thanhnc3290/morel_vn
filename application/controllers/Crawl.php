<?php  
Class Crawl extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct(){
		parent::__construct();

		$this->load->model('site_info_model');
		$this->load->model('catalog_model');
        $this->load->model('product_model');
		$this->load->model('news_model');
	}

    function product(){
        $this->load->view('site/crawl/crawl_product', $this->data);
    }

    function blog(){
        $this->load->view('site/crawl/crawl_blog', $this->data);
    }
	
}