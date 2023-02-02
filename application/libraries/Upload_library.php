<?php

Class Upload_library
{
	var $CI = '';
	function __construct()
	{
		$this->CI = & get_instance();
	}


	/*
	* Upload file
	@ Upload_path: đường dẫn lưu file
	@ file_name: tên thẻ input upload file
	*/
	function upload($upload_path = '', $file_name = '')
	{
		$config = $this->config($upload_path);
		$this->CI->load->library('upload', $config);
		if($this->CI->upload->do_upload($file_name))
		{
			//Thực hiện upload
			$data = $this->CI->upload->data();
		}else{
			//Không upload thành công
			$data = $this->CI->upload->display_errors();
		}

		return $data;
	}

	/*
	* Upload nhiều file
	@ Upload_path: đường dẫn lưu file
	@ file_name: tên thẻ input upload file
	*/
	function upload_file($upload_path = '', $file_name = '')
	{
		//Lấy thông tin cấu hình upload
		$config = $this->config($upload_path);

		//lưu biến môi trường khi thực hiện upload ảnh với name="image_list"
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload
        $image_list = array(); //Lưu tên các file ảnh upload thành công

        for($i=0; $i<=$count-1; $i++) 
        {
              
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->CI->load->library('upload', $config);
              //thực hiện upload từng file
              if($this->CI->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->CI->upload->data();
                  //in cấu trúc dữ liệu của các file
                 $image_list[]= $data['file_name'];
              }     
        }
        return $image_list;
	}

	function upload_file_2($upload_path_2 = '', $file_name = '')
	{
		//Lấy thông tin cấu hình upload
		$config = $this->config($upload_path_2);

		//lưu biến môi trường khi thực hiện upload ảnh với name="image_list_2"
        $file  = $_FILES['image_list_2'];
        $count = count($file['name']);//lấy tổng số file được upload
        $image_list = array(); //Lưu tên các file ảnh upload thành công

        for($i=0; $i<=$count-1; $i++) 
        {
              
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->CI->load->library('upload', $config);
              //thực hiện upload từng file
              if($this->CI->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->CI->upload->data();
                  //in cấu trúc dữ liệu của các file
                 $image_list[]= $data['file_name'];
              }     
        }
        return $image_list;
	}

	
	/*
	*Cấu hình Upload file
	*/
	function config($upload_path = '')
	{
		//Khai bao bien cau hinh
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|webp|pdf';

         //Dung lượng tối đa
         $config['max_size']      = '';
         //Chiều rộng tối đa
         $config['max_width']     = '';
         //Chiều cao tối đa
         $config['max_height']    = '';

         return $config;
	}
}