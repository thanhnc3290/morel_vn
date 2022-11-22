<?php 
Class Before_after extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('before_after_model');
        

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;
        
        $input_before_after = array();
        $input_before_after['order'] = array('sort_order','asc');
        $list  = $this->before_after_model->get_list($input_before_after);
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


		$this->data['temp'] ='admin/before_after/index';
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
                $status					= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/before_after';
                
                $upload_data_image_d = $this->upload_library->upload($upload_path, 'image_link_d');

				$image_link_d ='';
				if(isset($upload_data_image_d['file_name']))
				{
					$image_link_d = $upload_data_image_d['file_name'];
				}

				$upload_data_image_m = $this->upload_library->upload($upload_path, 'image_link_m');

				$image_link_m ='';
				if(isset($upload_data_image_m['file_name']))
				{
					$image_link_m = $upload_data_image_m['file_name'];
                }
                
                $upload_data_icon_before = $this->upload_library->upload($upload_path, 'icon_before');

				$icon_before ='';
				if(isset($upload_data_icon_before['file_name']))
				{
					$icon_before = $upload_data_icon_before['file_name'];
                }
                
                $upload_data_icon_after = $this->upload_library->upload($upload_path, 'icon_after');

				$icon_after ='';
				if(isset($upload_data_icon_after['file_name']))
				{
					$icon_after = $upload_data_icon_after['file_name'];
				}

				
                $data = array(
						'name'                 	=> $name,
                        'image_link_d'          => $image_link_d,
                        'image_link_m'     		=> $image_link_m,
                        'icon_before'           => $icon_before,
                        'icon_after'     		=> $icon_after,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                    );
                
                if($this->before_after_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('before_after')); 
				
				
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
				$info 					= $this->before_after_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
	                $status					= $this->input->post('status');
	                $sort_order				= $this->input->post('sort_order');

					//Lấy tên file ảnh minh họa được upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/before_after';
                    
                    $upload_data_image_d = $this->upload_library->upload($upload_path, 'image_link_d');

                    $image_link_d ='';
                    if(isset($upload_data_image_d['file_name']))
                    {
                        $image_link_d = $upload_data_image_d['file_name'];
                    }

                    $upload_data_image_m = $this->upload_library->upload($upload_path, 'image_link_m');

                    $image_link_m ='';
                    if(isset($upload_data_image_m['file_name']))
                    {
                        $image_link_m = $upload_data_image_m['file_name'];
                    }
                    
                    $upload_data_icon_before = $this->upload_library->upload($upload_path, 'icon_before');

                    $icon_before ='';
                    if(isset($upload_data_icon_before['file_name']))
                    {
                        $icon_before = $upload_data_icon_before['file_name'];
                    }
                    
                    $upload_data_icon_after = $this->upload_library->upload($upload_path, 'icon_after');

                    $icon_after ='';
                    if(isset($upload_data_icon_after['file_name']))
                    {
                        $icon_after = $upload_data_icon_after['file_name'];
                    }

					
					
					$data = array(
						'name'                 	=> $name,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
					);
					
					if($image_link_d != '')
					{
						$image_link_d_of_this_info = './upload/before_after/'.$info->image_link_d; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_d_of_this_info); // Xóa ảnh cũ
						$data['image_link_d'] = $image_link_d;
					}

					if($image_link_m != '')
					{
						$image_link_m_of_this_info = './upload/before_after/'.$info->image_link_m; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_m_of_this_info); // Xóa ảnh cũ
						$data['image_link_m'] = $image_link_m;
                    }
                    
                    if($icon_before != '')
					{
						$icon_before_of_this_info = './upload/before_after/'.$info->icon_before; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($icon_before_of_this_info); // Xóa ảnh cũ
						$data['icon_before'] = $icon_before;
                    }
                    
                    if($icon_after != '')
					{
						$icon_after_of_this_info = './upload/before_after/'.$info->icon_after; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($icon_after_of_this_info); // Xóa ảnh cũ
						$data['icon_after'] = $icon_after;
					}

					
					if($this->before_after_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('before_after')); 
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
		$info = $this->before_after_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('before_after'));
		}

		//Thực hiện xóa
		$image_link_d_of_this_info = './upload/before_after/'.$info->image_link_d; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_d_of_this_info); // Xóa ảnh

		$image_link_m_of_this_info = './upload/before_after/'.$info->image_link_m; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
        unlink($image_link_m_of_this_info); // Xóa ảnh
        
        $icon_before_of_this_info = './upload/before_after/'.$info->icon_before; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
        unlink($icon_before_of_this_info); // Xóa ảnh
        
        $icon_after_of_this_info = './upload/before_after/'.$info->icon_after; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($icon_after_of_this_info); // Xóa ảnh


		$this->before_after_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('before_after'));
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