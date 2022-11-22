<?php 
Class Footer extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('footer_model');
        

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

        $input_footer = array();
        $input_footer['order'] = array('sort_order','asc');
        $list  = $this->footer_model->get_list($input_footer);
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


		$this->data['temp'] ='admin/footer/index';
		$this->load->view('admin/main', $this->data);
	}

	/*
	*Hàm Chỉnh sửa nội dung giới thiệu chân trang
	*/
	function edit_footer_desc_modal(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('footer_desc','footer_desc','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$footer_desc  = $this->input->post('footer_desc');

					$data = array(
						'footer_desc' => $footer_desc,
					);

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('footer')); 
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
				$name					= str_replace(array('`','"',"'"), '', $name);
                $catalog_id             = $this->input->post('catalog_id');
                $sort_order				= $this->input->post('sort_order');
				

				
                $data = array(
						'name'                 	=> $name,
                        'catalog_id'			=> $catalog_id,
                        'sort_order'			=> $sort_order,
                    );
                
                if($this->footer_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('footer')); 
				
				
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
				$info 					= $this->footer_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
					$name					= str_replace(array('`','"',"'"), '', $name);
	                $catalog_id             = $this->input->post('catalog_id');
	                $sort_order				= $this->input->post('sort_order');

					
					
					$data = array(
						'name'                 	=> $name,
                        'catalog_id'			=> $catalog_id,
                        'sort_order'			=> $sort_order,
					);
					
					
					


					if($this->footer_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('footer')); 
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
		$info = $this->footer_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('footer'));
		}


		$this->footer_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('footer'));
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