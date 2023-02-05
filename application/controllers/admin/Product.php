<?php 
Class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('product_model');
        $this->load->model('product_technology_model');
        

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;
        
        

        $input_product = array();
        $input_product['order'] = array('id','desc');
        $list  = $this->product_model->get_list($input_product);
        $this->data['list'] = $list;

        $input_technology = array();
        $input_technology['order'] = array('id','desc');
        $technology_list  = $this->product_technology_model->get_list($input_technology);
        $this->data['technology_list'] = $technology_list;

        
	}

	/*
	*Lấy danh sách admin
	*/
	function index()
	{
        

		//Lấy nội dung của biến message
		$message               = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view


		$this->data['temp'] ='admin/product/index';
		$this->load->view('admin/main', $this->data);
	}

    function add()
    {
        $this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('alias','Tên','required');
			$this->form_validation->set_rules('catalog_id','danh mục dịch vụ','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name             		= $this->input->post('name');
                $alias             		= $this->input->post('alias');
                $catalog_id             = $this->input->post('catalog_id');
				$layout_type            = $this->input->post('layout_type');
                $status                 = $this->input->post('status');
                $sort_order             = $this->input->post('sort_order');
                $meta_desc              = $this->input->post('meta_desc');
                $meta_key               = $this->input->post('meta_key');
                $content                = $this->input->post('content');

				$option_name_1			= $this->input->post('option_name_1');
				if($option_name_1 !== ''){
					$option_name_1          = str_replace(array('"',"'"),'&quot;',$option_name_1);
				}
				$option_name_2			= $this->input->post('option_name_2');
				if($option_name_2 !== ''){
					$option_name_2          = str_replace(array('"',"'"),'&quot;',$option_name_2);
				}
				$option_name_3			= $this->input->post('option_name_3');
				if($option_name_3 !== ''){
					$option_name_3          = str_replace(array('"',"'"),'&quot;',$option_name_3);
				}
				$option_name_4			= $this->input->post('option_name_4');
				if($option_name_4 !== ''){
					$option_name_4          = str_replace(array('"',"'"),'&quot;',$option_name_4);
				}

                $option_price_1         = $this->input->post('option_price_1');
                $option_price_2         = $this->input->post('option_price_2');
                $option_price_3         = $this->input->post('option_price_3');
                $option_price_4         = $this->input->post('option_price_4');

				$technology_id   = $this->input->post('technology_id');
				$technology_id   = json_encode($technology_id);

				$specification			= $this->input->post('specification');

				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/product';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				$upload_data_image_social = $this->upload_library->upload($upload_path, 'social_image_link');

				$social_image_link ='';
				if(isset($upload_data_image_social['file_name']))
				{
					$social_image_link = $upload_data_image_social['file_name'];
				}

                //Upload các ảnh kèm theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);

				//upload các tài liệu kèm theo
				$image_list_2 = array();
				$image_list_2 = $this->upload_library->upload_file_2($upload_path, 'image_list_2');
				$image_list_2 = json_encode($image_list_2);
				
                $data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'catalog_id'			=> $catalog_id,
						'layout_type'			=> $layout_type,
                        'status'                => $status,
                        'sort_order'            => $sort_order,
                        'meta_desc'             => $meta_desc,
                        'meta_key'              => $meta_key,
                        'content'               => $content,

                        'image_link'            => $image_link,
                        'social_image_link'     => $social_image_link,
                        'image_list'            => $image_list,

                        'option_name_1'         => $option_name_1,
                        'option_name_2'         => $option_name_2,
                        'option_name_3'         => $option_name_3,
                        'option_name_4'         => $option_name_4,

                        'option_price_1'        => $option_price_1,
                        'option_price_2'        => $option_price_2,
                        'option_price_3'        => $option_price_3,
                        'option_price_4'        => $option_price_4,

						'technology_id'			=> $technology_id,
						'specification'			=> $specification,
						'documentary'			=> $image_list_2,
                    );
                
                if($this->product_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('product')); 
				
				
			}

		}
        $this->data['temp'] ='admin/product/add';
		$this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        //Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$info = $this->product_model->get_info($id);
		if(!$info) redirect();

		$this->data['id'] = $id;
		$this->data['info'] = $info;
        
        $this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('alias','Tên','required');
			$this->form_validation->set_rules('catalog_id','danh mục dịch vụ','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name             		= $this->input->post('name');
                $alias             		= $this->input->post('alias');
                $catalog_id             = $this->input->post('catalog_id');
				$layout_type			= $this->input->post('layout_type');
                $status                 = $this->input->post('status');
                $sort_order             = $this->input->post('sort_order');
                $meta_desc              = $this->input->post('meta_desc');
                $meta_key               = $this->input->post('meta_key');
                $content                = $this->input->post('content');

				$option_name_1			= $this->input->post('option_name_1');
				if($option_name_1 !== ''){
					$option_name_1          = str_replace(array('"',"'"),'&quot;',$this->input->post('option_name_1'));
				}
				$option_name_2			= $this->input->post('option_name_2');
				if($option_name_2 !== ''){
					$option_name_2          = str_replace(array('"',"'"),'&quot;',$this->input->post('option_name_2'));
				}
				$option_name_3			= $this->input->post('option_name_3');
				if($option_name_3 !== ''){
					$option_name_3          = str_replace(array('"',"'"),'&quot;',$this->input->post('option_name_3'));
				}
				$option_name_4			= $this->input->post('option_name_4');
				if($option_name_4 !== ''){
					$option_name_4          = str_replace(array('"',"'"),'&quot;',$this->input->post('option_name_4'));
				}

                $option_price_1         = $this->input->post('option_price_1');
                $option_price_2         = $this->input->post('option_price_2');
                $option_price_3         = $this->input->post('option_price_3');
                $option_price_4         = $this->input->post('option_price_4');

				$technology_id   = $this->input->post('technology_id');
				$technology_id   = json_encode($technology_id);

				$specification 			= $this->input->post('specification');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/product';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				$upload_data_image_social = $this->upload_library->upload($upload_path, 'social_image_link');

				$social_image_link ='';
				if(isset($upload_data_image_social['file_name']))
				{
					$social_image_link = $upload_data_image_social['file_name'];
				}

                //Upload các ảnh kèm theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);

				//upload các tài liệu kèm theo
				$image_list_2 = array();
				$image_list_2 = $this->upload_library->upload_file_2($upload_path, 'image_list_2');
				$image_list_2 = json_encode($image_list_2);
				
                $data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'catalog_id'			=> $catalog_id,
						'layout_type'			=> $layout_type,
                        'status'                => $status,
                        'sort_order'            => $sort_order,
                        'meta_desc'             => $meta_desc,
                        'meta_key'              => $meta_key,
                        'content'               => $content,

                        'option_name_1'         => $option_name_1,
                        'option_name_2'         => $option_name_2,
                        'option_name_3'         => $option_name_3,
                        'option_name_4'         => $option_name_4,

                        'option_price_1'        => $option_price_1,
                        'option_price_2'        => $option_price_2,
                        'option_price_3'        => $option_price_3,
                        'option_price_4'        => $option_price_4,

						'technology_id'			=> $technology_id,
						'specification'			=> $specification,

                    );

                    if($image_link != '')
					{
						$image_link_of_this_info = './upload/product/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}
					
					if($social_image_link != '')
					{
						$social_image_link_of_this_info = './upload/product/'.$info->social_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($social_image_link_of_this_info); // Xóa ảnh cũ
						$data['social_image_link'] = $social_image_link;
					}
                    
                    if(($image_list !== '[]'))
                    {
                        $data['image_list'] = $image_list;

                        $image_list_to_delete = json_decode($info->image_list);
                        if(is_array($image_list_to_delete))
                        {  
                            foreach ($image_list_to_delete as $img) 
                            {
                                $image_link = './upload/product/'.$img;
                                if(file_exists($image_link))
                                {
                                    unlink($image_link);
                                }
                            }
                        }
                    }

					if(($image_list_2 !== '[]'))
                    {
                        $data['documentary'] = $image_list_2;

                        $image_list_to_delete = json_decode($info->documentary);
                        if(is_array($image_list_to_delete))
                        {  
                            foreach ($image_list_to_delete as $img) 
                            {
                                $image_link = './upload/product/'.$img;
                                if(file_exists($image_link))
                                {
                                    unlink($image_link);
                                }
                            }
                        }
                    }
                
                if($this->product_model->update($id,$data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('product')); 
				
				
			}

		}
        $this->data['temp'] ='admin/product/edit';
		$this->load->view('admin/main', $this->data);
    }


    


	/*
	*Hàm xóa thông tin admin
	*/
	function delete()
	{
		$this->load->helper('file');

		//Lấy ID của quản trị viên cần xóa
		$id   = $this->uri->rsegment('3');
		$id   = intval($id);

		//Lấy thông tin của quản trị viên cần xóa
		$info = $this->product_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('product'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/product/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$social_image_link_of_this_info = './upload/product/'.$info->social_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($social_image_link_of_this_info); // Xóa ảnh

		$this->product_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('product'));
	}

	/*
	*Thực hiện đăng xuất
	*/
	function logout()
	{
		if($this->session->userdata('login'))
		{
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}
}