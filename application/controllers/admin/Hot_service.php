<?php 
Class Hot_service extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('hot_service_model');
        

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;

        //Kiểm tra catalog có danh mục con hay không - nếu có thì gọi ra, kiểm tra và sắp xếp
        $input_catalog = array();
        $input_catalog['where'] = array('parent_id' => 0);
        $input_catalog['order'] = array('sort_order','asc');
        $list = $this->hot_service_model->get_list($input_catalog);
        foreach ($list as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $input['order'] = array('sort_order','asc');
            $subs = $this->hot_service_model->get_list($input);
            $row->subs = $subs;

        }
        $this->data['list'] = $list; 
        
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

		$this->data['temp'] ='admin/hot_service/index';
		$this->load->view('admin/main', $this->data);
	}
	
	

	/*
	*Hàm tạo mới thông tin bằng popup
	*/
	function create_modal(){
		$this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Tên','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name             		= $this->input->post('name');
				$title             		= $this->input->post('title');
				$meta_desc             	= $this->input->post('meta_desc');
                $status					= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
                $link 					= $this->input->post('link');
                //$parent_id 				= $this->input->post('parent_id');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/hot_service';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				$upload_data_thumb_image = $this->upload_library->upload($upload_path, 'thumb_image_link');

				$thumb_image_link ='';
				if(isset($upload_data_thumb_image['file_name']))
				{
					$thumb_image_link = $upload_data_thumb_image['file_name'];
				}

				
				
                $data = array(
						'name'                 	=> $name,
						'title'                 => $title,
						'meta_desc'             => $meta_desc,
						'image_link'            => $image_link,
						'thumb_image_link'		=> $thumb_image_link,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
                        //'parent_id'				=> $parent_id,
						'created'				=> now(),
                    );
                
                if($this->hot_service_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('hot_service')); 
				
				
			}

		}
	}

	/*
	*Hàm chỉnh sửa thông tin bằng popup
	*/
	function edit_modal(){
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Tên','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= $this->input->post('id');
				$id   					= intval($id);
				$info 					= $this->hot_service_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
					$title             		= $this->input->post('title');
					$meta_desc             	= $this->input->post('meta_desc');
					$status					= $this->input->post('status');
					$sort_order				= $this->input->post('sort_order');
					$link 					= $this->input->post('link');
	                //$parent_id 				= $this->input->post('parent_id');

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
	                $upload_path = './upload/hot_service';
	                
	                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

					$image_link ='';
					if(isset($upload_data_image['file_name']))
					{
						$image_link = $upload_data_image['file_name'];
					}

					$upload_data_thumb_image = $this->upload_library->upload($upload_path, 'thumb_image_link');

					$thumb_image_link ='';
					if(isset($upload_data_thumb_image['file_name']))
					{
						$thumb_image_link = $upload_data_thumb_image['file_name'];
					}

					
					
					$data = array(
						'name'                 	=> $name,
						'title'                 => $title,
						'meta_desc'             => $meta_desc,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
                        //'parent_id'				=> $parent_id,
					);
					
					if($image_link != '')
					{
						$image_link_of_this_info = './upload/hot_service/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}

					if($thumb_image_link != '')
					{
						$thumb_image_link_of_this_info = './upload/hot_service/'.$info->thumb_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($thumb_image_link_of_this_info); // Xóa ảnh cũ
						$data['thumb_image_link'] = $thumb_image_link;
					}

					


					if($this->hot_service_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('hot_service')); 
				}
			}

		}
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
		$info = $this->hot_service_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('hot_service'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/hot_service/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$thumb_image_link_of_this_info = './upload/hot_service/'.$info->thumb_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($thumb_image_link_of_this_info); // Xóa ảnh

		$this->hot_service_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('hot_service'));
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