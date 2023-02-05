<?php 
Class Home_page extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
		$this->load->model('product_model');

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
		$input_product_list = array();
		$this->db->select('id, name, status');
		$product_list = $this->product_model->get_list($input_product_list);
		$this->data['product_list'] = $product_list;
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
			$this->form_validation->set_rules('video_title','tên video','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
                //video
                $video_title            = $this->input->post('video_title');
				$video_id               = str_replace('https://www.youtube.com/watch?v=','',$this->input->post('video_id'));

                //sản phẩm tiêu biểu
                $relate_title_1         	= $this->input->post('relate_title_1'); 
                $relate_title_2         	= $this->input->post('relate_title_2');
                $relate_product_list    	= $this->input->post('relate_product_list');
				$relate_product_list   		= json_encode($relate_product_list);

                $relate_banner_link     	= $this->input->post('relate_banner_link');
				$relate_banner_link_2     	= $this->input->post('relate_banner_link_2');
				$relate_banner_link_3     	= $this->input->post('relate_banner_link_3');
				$relate_banner_link_4     	= $this->input->post('relate_banner_link_4');

				//công nghệ
				$tech_title_1				= $this->input->post('tech_title_1');
				$tech_title_2				= $this->input->post('tech_title_2');
				$tech_title_3				= $this->input->post('tech_title_3');
				$tech_title_4				= $this->input->post('tech_title_4');

				$tech_desc_1				= $this->input->post('tech_desc_1');
				$tech_desc_2				= $this->input->post('tech_desc_2');
				$tech_desc_3				= $this->input->post('tech_desc_3');
				$tech_desc_4				= $this->input->post('tech_desc_4');

                //banner
				$this->load->library('upload_library');
				$upload_path = './upload/site_info';

				$upload_data_relate_banner_image = $this->upload_library->upload($upload_path, 'relate_banner_image');

				$relate_banner_image ='';
				if(isset($upload_data_relate_banner_image['file_name']))
				{
					$relate_banner_image = $upload_data_relate_banner_image['file_name'];
				}

				$upload_data_relate_banner_image_mobile = $this->upload_library->upload($upload_path, 'relate_banner_image_mobile');

				$relate_banner_image_mobile ='';
				if(isset($upload_data_relate_banner_image_mobile['file_name']))
				{
					$relate_banner_image_mobile = $upload_data_relate_banner_image_mobile['file_name'];
				}
				

				$upload_data_relate_banner_image_2 = $this->upload_library->upload($upload_path, 'relate_banner_image_2');

				$relate_banner_image_2 ='';
				if(isset($upload_data_relate_banner_image_2['file_name']))
				{
					$relate_banner_image_2 = $upload_data_relate_banner_image_2['file_name'];
				}

				$upload_data_relate_banner_image_2_mobile = $this->upload_library->upload($upload_path, 'relate_banner_image_2_mobile');

				$relate_banner_image_2_mobile ='';
				if(isset($upload_data_relate_banner_image_2_mobile['file_name']))
				{
					$relate_banner_image_2_mobile = $upload_data_relate_banner_image_2_mobile['file_name'];
				}

				$upload_data_relate_banner_image_3 = $this->upload_library->upload($upload_path, 'relate_banner_image_3');

				$relate_banner_image_3 ='';
				if(isset($upload_data_relate_banner_image_3['file_name']))
				{
					$relate_banner_image_3 = $upload_data_relate_banner_image_3['file_name'];
				}

				$upload_data_relate_banner_image_3_mobile = $this->upload_library->upload($upload_path, 'relate_banner_image_3_mobile');

				$relate_banner_image_3_mobile ='';
				if(isset($upload_data_relate_banner_image_3_mobile['file_name']))
				{
					$relate_banner_image_3_mobile = $upload_data_relate_banner_image_3_mobile['file_name'];
				}

				$upload_data_relate_banner_image_4 = $this->upload_library->upload($upload_path, 'relate_banner_image_4');

				$relate_banner_image_4 ='';
				if(isset($upload_data_relate_banner_image_4['file_name']))
				{
					$relate_banner_image_4 = $upload_data_relate_banner_image_4['file_name'];
				}

				// $upload_data_relate_banner_image_4_mobile = $this->upload_library->upload($upload_path, 'relate_banner_image_4_mobile');

				// $relate_banner_image_4_mobile ='';
				// if(isset($upload_data_relate_banner_image_4_mobile['file_name']))
				// {
				// 	$relate_banner_image_4_mobile = $upload_data_relate_banner_image_4_mobile['file_name'];
				// }
				
				$data = array(
					'video_title'           	=> $video_title,
                    'video_id'              	=> $video_id,
                    'relate_title_1'        	=> $relate_title_1,
                    'relate_title_2'        	=> $relate_title_2,
                    'relate_product_list'   	=> $relate_product_list,
                    'relate_banner_link'    	=> $relate_banner_link,
					'relate_banner_link_2'    	=> $relate_banner_link_2,
					'relate_banner_link_3'    	=> $relate_banner_link_3,
					'relate_banner_link_4'    	=> $relate_banner_link_4,
					'tech_title_1'				=> $tech_title_1,
					'tech_title_2'				=> $tech_title_2,
					'tech_title_3'				=> $tech_title_3,
					'tech_title_4'				=> $tech_title_4,
					'tech_desc_1'				=> $tech_desc_1,
					'tech_desc_2'				=> $tech_desc_2,
					'tech_desc_3'				=> $tech_desc_3,
					'tech_desc_4'				=> $tech_desc_4,
				);

                if($relate_banner_image != '')
				{
					$relate_banner_image_of_this_info = './upload/site_info/'.$info->relate_banner_image; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info); // Xóa ảnh cũ
					$data['relate_banner_image'] = $relate_banner_image;
				}

				if($relate_banner_image_mobile != '')
				{
					$relate_banner_image_of_this_info_mobile = './upload/site_info/'.$info->relate_banner_image_mobile; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info_mobile); // Xóa ảnh cũ
					$data['relate_banner_image_mobile'] = $relate_banner_image_mobile;
				}

				if($relate_banner_image_2 != '')
				{
					$relate_banner_image_of_this_info_2 = './upload/site_info/'.$info->relate_banner_image_2; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info_2); // Xóa ảnh cũ
					$data['relate_banner_image_2'] = $relate_banner_image_2;
				}

				if($relate_banner_image_2_mobile != '')
				{
					$relate_banner_image_of_this_info_2_mobile = './upload/site_info/'.$info->relate_banner_image_2_mobile; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info_2_mobile); // Xóa ảnh cũ
					$data['relate_banner_image_2_mobile'] = $relate_banner_image_2_mobile;
				}

				if($relate_banner_image_3 != '')
				{
					$relate_banner_image_of_this_info_3 = './upload/site_info/'.$info->relate_banner_image_3; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info_3); // Xóa ảnh cũ
					$data['relate_banner_image_3'] = $relate_banner_image_3;
				}

				if($relate_banner_image_3_mobile != '')
				{
					$relate_banner_image_of_this_info_3_mobile = './upload/site_info/'.$info->relate_banner_image_3_mobile; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					unlink($relate_banner_image_of_this_info_3_mobile); // Xóa ảnh cũ
					$data['relate_banner_image_3_mobile'] = $relate_banner_image_3_mobile;
				}

				// if($relate_banner_image_4_mobile != '')
				// {
				// 	$relate_banner_image_of_this_info_4_mobile = './upload/site_info/'.$info->relate_banner_image_4_mobile; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
				// 	unlink($relate_banner_image_of_this_info_4_mobile); // Xóa ảnh cũ
				// 	$data['relate_banner_image_4_mobile'] = $relate_banner_image_4_mobile;
				// }
				                
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

		$this->data['temp']  ='admin/home_page/edit';
		$this->load->view('admin/main', $this->data);
	}

	// function edit_message_total_site()
	// {
	// 	$this->load->library('form_validation');
	// 	$this->load->helper('form');
	// 	if($this->input->post())
	// 	{
	// 		$this->form_validation->set_rules('message_total_site','message_total_site','required');
	// 		// Nhập Liệu chính xác
	// 		if($this->form_validation->run())
	// 		{
	// 			$id						= '1';
	// 			$id   					= intval($id);
	// 			$info 					= $this->site_info_model->get_info($id);
	// 			if(isset($info)){
	// 				// Thêm vào cơ sở dữ liệu
	// 				$message_total_site  = $this->input->post('message_total_site');

	// 				$data = array(
	// 					'message_total_site' => $message_total_site,
	// 				);

	// 				if($this->site_info_model->update($id, $data))
	// 				{
	// 					//Tạo ra nội dung thông báo
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
	// 				}else{
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
	// 				}
	// 				//Chuyển tới trang danh sách quản trị viên
					
	// 				redirect(admin_url('site_info/edit/1')); 
	// 			}
	// 		}
	// 	}
	// }

	// function edit_popup(){
	// 	$this->load->library('form_validation');
	// 	$this->load->helper('form');
	// 	if($this->input->post())
	// 	{
	// 		$this->form_validation->set_rules('popup_name','popup_name','required');
	// 		// Nhập Liệu chính xác
	// 		if($this->form_validation->run())
	// 		{
	// 			$id						= '1';
	// 			$id   					= intval($id);
	// 			$info 					= $this->site_info_model->get_info($id);
	// 			if(isset($info)){
	// 				// Thêm vào cơ sở dữ liệu
	// 				$popup_name  	= $this->input->post('popup_name');
	// 				$popup_link  	= $this->input->post('popup_link');
	// 				$popup_status  	= $this->input->post('popup_status');

	// 				//Lấy tên file ảnh minh họa được upload lên
	// 				$this->load->library('upload_library');
	// 				$upload_path = './upload/site_info';

	// 				$upload_data_popup_image_link = $this->upload_library->upload($upload_path, 'popup_image_link');

	// 				$popup_image_link ='';
	// 				if(isset($upload_data_popup_image_link['file_name']))
	// 				{
	// 					$popup_image_link = $upload_data_popup_image_link['file_name'];
	// 				}

	// 				$data = array(
	// 					'popup_name' 	=> $popup_name,
	// 					'popup_link' 	=> $popup_link,
	// 					'popup_status' 	=> $popup_status,
	// 				);

	// 				if($popup_image_link != '')
	// 				{
	// 					$popup_image_link_of_this_info = './upload/site_info/'.$info->popup_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
	// 					unlink($popup_image_link_of_this_info); // Xóa ảnh cũ
	// 					$data['popup_image_link'] = $popup_image_link;
	// 				}

	// 				if($this->site_info_model->update($id, $data))
	// 				{
	// 					//Tạo ra nội dung thông báo
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
	// 				}else{
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
	// 				}
	// 				//Chuyển tới trang danh sách quản trị viên
					
	// 				redirect(admin_url('site_info/edit/1')); 
	// 			}
	// 		}
	// 	}
	// }


	// function edit_slider_news_info(){
	// 	$this->load->library('form_validation');
	// 	$this->load->helper('form');
	// 	if($this->input->post())
	// 	{
	// 		$this->form_validation->set_rules('slider_news_title','slider_news_title','required');
	// 		// Nhập Liệu chính xác
	// 		if($this->form_validation->run())
	// 		{
	// 			$id						= '1';
	// 			$id   					= intval($id);
	// 			$info 					= $this->site_info_model->get_info($id);
	// 			if(isset($info)){
	// 				// Thêm vào cơ sở dữ liệu
	// 				$slider_news_title  	= $this->input->post('slider_news_title');
	// 				$slider_news_desc  		= $this->input->post('slider_news_desc');

					
	// 				$data = array(
	// 					'slider_news_title' 	=> $slider_news_title,
	// 					'slider_news_desc' 		=> $slider_news_desc,
	// 				);

	// 				if($this->site_info_model->update($id, $data))
	// 				{
	// 					//Tạo ra nội dung thông báo
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
	// 				}else{
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
	// 				}
	// 				//Chuyển tới trang danh sách quản trị viên
					
	// 				redirect(admin_url('slider_news')); 
	// 			}
	// 		}
	// 	}
	// }

	// function edit_robot_txt(){
	// 	$this->load->library('form_validation');
	// 	$this->load->helper('form');
	// 	if($this->input->post())
	// 	{
	// 		$this->form_validation->set_rules('robot_txt','robot_txt','required');
	// 		// Nhập Liệu chính xác
	// 		if($this->form_validation->run())
	// 		{
	// 			$id						= '1';
	// 			$id   					= intval($id);
	// 			$info 					= $this->site_info_model->get_info($id);
	// 			if(isset($info)){
	// 				// Thêm vào cơ sở dữ liệu
	// 				$robot_txt  = $this->input->post('robot_txt');

	// 				$data = array(
	// 					'robot_txt' => $robot_txt,
	// 				);

	// 				if($this->site_info_model->update($id, $data))
	// 				{	
	// 					$file = fopen("./robots.txt","w");// Mở File cần sửa -- "w": là viết đè lên --- "a": là viết thêm vào
	// 					fwrite($file,$robot_txt); // Thay đổi nôi dung file
	// 					fclose($file);
	// 					//Tạo ra nội dung thông báo
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
	// 				}else{
	// 					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
	// 				}
	// 				//Chuyển tới trang danh sách quản trị viên
					
	// 				redirect(admin_url('site_info/edit/1')); 
	// 			}
	// 		}
	// 	}
	// }


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