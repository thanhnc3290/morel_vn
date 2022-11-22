<?php 
Class Doctor_slider extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('doctor_slider_model');
        

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;
        

        $input_slider = array();
        $input_slider['order'] = array('id','desc');
        $list  = $this->doctor_slider_model->get_list($input_slider);
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


		$this->data['temp'] ='admin/doctor_slider/index';
		$this->load->view('admin/main', $this->data);
	}

	/*
	*Hàm tạo chỉnh sửa link xem thêm - tác động vào bảng site_info
	*/
	function edit_total_link_modal(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('doctor_slider_total_link','doctor_slider_total_link','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$doctor_slider_total_link  = $this->input->post('doctor_slider_total_link');

					$data = array(
						'doctor_slider_total_link' => $doctor_slider_total_link,
					);

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('doctor_slider')); 
				}
			}
		}
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
				$position             	= $this->input->post('position');
                $content             	= $this->input->post('content');
                $status					= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
                $link 					= $this->input->post('link');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/doctor_slider';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				// $upload_data_background_image = $this->upload_library->upload($upload_path, 'background_image_link');

				// $background_image_link ='';
				// if(isset($upload_data_background_image['file_name']))
				// {
				// 	$background_image_link = $upload_data_background_image['file_name'];
				// }

				
                $data = array(
						'name'                 	=> $name,
                        'position'				=> $position,
                        'content'				=> $content,
                        'image_link'            => $image_link,
                        //'background_image_link' => $background_image_link,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
						'created'				=> now(),
                    );
                
                if($this->doctor_slider_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('doctor_slider')); 
				
				
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
				$info 					= $this->doctor_slider_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
					$position             	= $this->input->post('position');
	                $content             	= $this->input->post('content');
	                $status					= $this->input->post('status');
	                $sort_order				= $this->input->post('sort_order');
	                $link 					= $this->input->post('link');
					

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
	                $upload_path = './upload/doctor_slider';
	                
	                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

					$image_link ='';
					if(isset($upload_data_image['file_name']))
					{
						$image_link = $upload_data_image['file_name'];
					}

					// $upload_data_background_image = $this->upload_library->upload($upload_path, 'background_image_link');

					// $background_image_link ='';
					// if(isset($upload_data_background_image['file_name']))
					// {
					// 	$background_image_link = $upload_data_background_image['file_name'];
					// }

					
					
					$data = array(
						'name'                 	=> $name,
                        'position'				=> $position,
                        'content'				=> $content,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
					);
					
					if($image_link != '')
					{
						$image_link_of_this_info = './upload/doctor_slider/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}

					// if($background_image_link != '')
					// {
					// 	$background_image_link_of_this_info = './upload/doctor_slider/'.$info->background_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
					// 	unlink($background_image_link_of_this_info); // Xóa ảnh cũ
					// 	$data['background_image_link'] = $background_image_link;
					// }


					


					if($this->doctor_slider_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('doctor_slider')); 
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
		$info = $this->doctor_slider_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('doctor_slider'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/doctor_slider/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$background_image_link_of_this_info = './upload/doctor_slider/'.$info->background_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($background_image_link_of_this_info); // Xóa ảnh

		$this->doctor_slider_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('doctor_slider'));
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