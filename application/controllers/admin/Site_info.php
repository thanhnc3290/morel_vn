<?php 
Class Site_info extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
		$this->data['admin_login_id'] = $admin_login_id;

		//Check quyền ở đây


	}
	
	/*
	*Hàm chỉnh sửa thông tin admin
	*/
	function edit()
	{
		//Lấy ID của quản trị viên cần chỉnh sửa
		$id   = $this->uri->rsegment('3');
		$id   = intval($id);

		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('file');

		//Lấy thông tin của quản trị viên cần chỉnh sửa
		$info = $this->site_info_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại nội dung này');
			redirect(admin_url('admin'));
		}

		$this->data['info']  = $info;

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('site_title','Site Title','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$site_title             		= $this->input->post('site_title');
				$meta_desc              		= $this->input->post('meta_desc');
				$meta_key               		= $this->input->post('meta_key');
				$email                  		= $this->input->post('email');
				$fanpage                		= $this->input->post('fanpage');
				$zalo                			= $this->input->post('zalo');
				$youtube                		= $this->input->post('youtube');
				$phone                  		= $this->input->post('phone');
				$address                		= $this->input->post('address');
				$google_map                		= $this->input->post('google_map');
				$scripts_total_site     		= $this->input->post('scripts_total_site');
				$scripts_conversation   		= $this->input->post('scripts_conversation');
				$script_verified_site_in_body   = $this->input->post('script_verified_site_in_body');

			
				//Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
				$upload_path = './upload/site_info';

				$upload_data_social_image_link = $this->upload_library->upload($upload_path, 'social_image_link');

				$social_image_link ='';
				if(isset($upload_data_social_image_link['file_name']))
				{
					$social_image_link = $upload_data_social_image_link['file_name'];
				}

				
				
				$data = array(
						'site_title'          			=> $site_title,
						'meta_desc'          			=> $meta_desc,
						'meta_key'            			=> $meta_key,
						'email'               			=> $email,
						'fanpage'             			=> $fanpage,
						'youtube'             			=> $youtube,
						'zalo'             				=> $zalo,
						'phone'               			=> $phone,
						'address'             			=> $address,
						'google_map'             		=> $google_map,
						'scripts_total_site'  			=> $scripts_total_site,
						'scripts_conversation'			=> $scripts_conversation,
						'script_verified_site_in_body'	=> $script_verified_site_in_body,
					);

				

				if($social_image_link != '')
				{
					$social_image_link_of_this_info = './upload/site_info/'.$info->social_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($social_image_link_of_this_info); // Xóa ảnh cũ
					$data['social_image_link'] = $social_image_link;
				}

				
				
				if($this->site_info_model->update($id, $data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Chỉnh sửa dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Không chỉnh sửa dữ liệu thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				redirect(admin_url('home'));
			}

		}
		$this->data['temp']  ='admin/site_info/edit';
		$this->load->view('admin/main', $this->data);
	}

	function edit_message_total_site()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('message_total_site','message_total_site','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$message_total_site  = $this->input->post('message_total_site');

					$data = array(
						'message_total_site' => $message_total_site,
					);

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('site_info/edit/1')); 
				}
			}
		}
	}

	function edit_popup(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('popup_name','popup_name','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$popup_name  	= $this->input->post('popup_name');
					$popup_link  	= $this->input->post('popup_link');
					$popup_status  	= $this->input->post('popup_status');

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
					$upload_path = './upload/site_info';

					$upload_data_popup_image_link = $this->upload_library->upload($upload_path, 'popup_image_link');

					$popup_image_link ='';
					if(isset($upload_data_popup_image_link['file_name']))
					{
						$popup_image_link = $upload_data_popup_image_link['file_name'];
					}

					$data = array(
						'popup_name' 	=> $popup_name,
						'popup_link' 	=> $popup_link,
						'popup_status' 	=> $popup_status,
					);

					if($popup_image_link != '')
					{
						$popup_image_link_of_this_info = './upload/site_info/'.$info->popup_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($popup_image_link_of_this_info); // Xóa ảnh cũ
						$data['popup_image_link'] = $popup_image_link;
					}

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('site_info/edit/1')); 
				}
			}
		}
	}


	function edit_slider_news_info(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('slider_news_title','slider_news_title','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$slider_news_title  	= $this->input->post('slider_news_title');
					$slider_news_desc  		= $this->input->post('slider_news_desc');

					
					$data = array(
						'slider_news_title' 	=> $slider_news_title,
						'slider_news_desc' 		=> $slider_news_desc,
					);

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('slider_news')); 
				}
			}
		}
	}

	function edit_robot_txt(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('robot_txt','robot_txt','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$robot_txt  = $this->input->post('robot_txt');

					$data = array(
						'robot_txt' => $robot_txt,
					);

					if($this->site_info_model->update($id, $data))
					{	
						$file = fopen("./robots.txt","w");// Mở File cần sửa -- "w": là viết đè lên --- "a": là viết thêm vào
						fwrite($file,$robot_txt); // Thay đổi nôi dung file
						fclose($file);
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('site_info/edit/1')); 
				}
			}
		}
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