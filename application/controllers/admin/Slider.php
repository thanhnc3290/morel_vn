<?php 
Class Slider extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('slider_model');
        

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
        $catalog_list = $this->catalog_model->get_list($input_catalog);
        foreach ($catalog_list as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $input['order'] = array('sort_order','asc');
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;

            foreach($subs as $subs)
            {
                $input_subs['where'] = array('parent_id' => $subs->id);
                $input_subs['order'] = array('sort_order','asc');
                $subss = $this->catalog_model->get_list($input_subs);
                $subs->subss = $subss;
            }
        }
        $this->data['catalog_list'] = $catalog_list; 

        $input_slider = array();
        $input_slider['order'] = array('id','desc');
        $list  = $this->slider_model->get_list($input_slider);
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


		$this->data['temp'] ='admin/slider/index';
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
                $catalog_id             = $this->input->post('catalog_id');
                $status					= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
                $link 					= $this->input->post('link');
                $type 					= $this->input->post('type');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/slider';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				$upload_data_image_m = $this->upload_library->upload($upload_path, 'image_link_m');

				$image_link_m ='';
				if(isset($upload_data_image_m['file_name']))
				{
					$image_link_m = $upload_data_image_m['file_name'];
				}

				$upload_data_image_banner = $this->upload_library->upload($upload_path, 'image_link_banner');

				$image_link_banner ='';
				if(isset($upload_data_image_banner['file_name']))
				{
					$image_link_banner = $upload_data_image_banner['file_name'];
				}
				
                $data = array(
						'name'                 	=> $name,
                        'catalog_id'			=> $catalog_id,
                        'image_link'            => $image_link,
                        'image_link_m'     		=> $image_link_m,
                        'image_link_banner'		=> $image_link_banner,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
                        'type'					=> $type,
						'created'				=> now(),
                    );
                
                if($this->slider_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('slider')); 
				
				
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
				$info 					= $this->slider_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
	                $catalog_id             = $this->input->post('catalog_id');
	                $status					= $this->input->post('status');
	                $sort_order				= $this->input->post('sort_order');
	                $link 					= $this->input->post('link');
	                $type 					= $this->input->post('type');

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
	                $upload_path = './upload/slider';
	                
	                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

					$image_link ='';
					if(isset($upload_data_image['file_name']))
					{
						$image_link = $upload_data_image['file_name'];
					}

					$upload_data_image_m = $this->upload_library->upload($upload_path, 'image_link_m');

					$image_link_m ='';
					if(isset($upload_data_image_m['file_name']))
					{
						$image_link_m = $upload_data_image_m['file_name'];
					}

					$upload_data_image_banner = $this->upload_library->upload($upload_path, 'image_link_banner');

					$image_link_banner ='';
					if(isset($upload_data_image_banner['file_name']))
					{
						$image_link_banner = $upload_data_image_banner['file_name'];
					}

					
					
					$data = array(
						'name'                 	=> $name,
                        'catalog_id'			=> $catalog_id,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'link'					=> $link,
                        'type'					=> $type,
					);
					
					if($image_link != '')
					{
						$image_link_of_this_info = './upload/slider/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}

					if($image_link_m != '')
					{
						$image_link_m_of_this_info = './upload/slider/'.$info->image_link_m; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_m_of_this_info); // Xóa ảnh cũ
						$data['image_link_m'] = $image_link_m;
					}

					if($image_link_banner != '')
					{
						$image_link_banner_of_this_info = './upload/slider/'.$info->image_link_banner; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_banner_of_this_info); // Xóa ảnh cũ
						$data['image_link_banner'] = $image_link_banner;
					}
					
					


					if($this->slider_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('slider')); 
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
		$info = $this->slider_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('slider'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/slider/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$image_link_m_of_this_info = './upload/slider/'.$info->image_link_m; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_m_of_this_info); // Xóa ảnh

		$image_link_banner_of_this_info = './upload/slider/'.$info->image_link_banner; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_banner_of_this_info); // Xóa ảnh

		$this->slider_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('slider'));
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