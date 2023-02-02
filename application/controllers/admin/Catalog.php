<?php 
Class Catalog extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('product_model');


		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;
        
        //Kiểm tra catalog có danh mục con hay không - nếu có thì gọi ra, kiểm tra và sắp xếp
        $input_catalog = array();
        $input_catalog['where'] = array('parent_id' => '0'); // Định nghĩa là dạng danh mục nội dung
        $input_catalog['order'] = array('sort_order','asc');
		$this->db->select('id, name, alias, parent_id, status, sort_order, meta_desc, meta_key, social_image_link, redirect_link');
        $list = $this->catalog_model->get_list($input_catalog);
        foreach ($list as $row)
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
        $this->data['list'] = $list; 

		$input_product_list = array();
		$this->db->select('id, catalog_id');
		$product_list = $this->product_model->get_list($input_product_list);
		$this->data['product_list'] = $product_list;
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


		$this->data['temp'] ='admin/catalog/index';
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
			$this->form_validation->set_rules('alias','Tên','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name             		= $this->input->post('name');
                $alias             		= $this->input->post('alias');
                $parent_id              = $this->input->post('parent_id');
                $status					= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
                $meta_desc				= $this->input->post('meta_desc');
                $meta_key				= $this->input->post('meta_key');
				$redirect_link			= $this->input->post('redirect_link');
				

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/catalog_product';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}
				
                $data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'parent_id'			    => $parent_id,
                        'social_image_link'     => $image_link,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'meta_desc'             => $meta_desc,
                        'meta_key'              => $meta_key,
						'redirect_link'			=> $redirect_link,
                    );
                
                if($this->catalog_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('catalog')); 
				
				
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
			$this->form_validation->set_rules('alias','Tên','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= $this->input->post('id');
				$id   					= intval($id);
				$info 					= $this->catalog_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
					$alias             		= $this->input->post('alias');
					$parent_id              = $this->input->post('parent_id');
					$status					= $this->input->post('status');
					$sort_order				= $this->input->post('sort_order');
					$meta_desc				= $this->input->post('meta_desc');
					$meta_key				= $this->input->post('meta_key');
					$redirect_link			= $this->input->post('redirect_link');

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
					$upload_path = './upload/catalog_product';
					
					$upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

					$image_link ='';
					if(isset($upload_data_image['file_name']))
					{
						$image_link = $upload_data_image['file_name'];
					}

					
					
					$data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'parent_id'			    => $parent_id,
                        'social_image_link'     => $image_link,
						'status'                => $status,
                        'sort_order'			=> $sort_order,
                        'meta_desc'             => $meta_desc,
                        'meta_key'              => $meta_key,
						'redirect_link'			=> $redirect_link,
					);
					
					if($image_link != '')
					{
						$image_link_of_this_info = './upload/catalog_product/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['social_image_link'] = $image_link;
					}
					
					


					if($this->catalog_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('catalog')); 
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
		$info = $this->catalog_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('catalog'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/catalog_product/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$this->catalog_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('catalog'));
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