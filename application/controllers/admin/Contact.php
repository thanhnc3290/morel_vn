<?php 
Class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model'); 

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
	}

	/*
	*Lấy danh sách admin
	*/
	function index()
	{
		

		//Lấy ra danh sách
		$input= array();
		$input['where'] = array();
		$input['order'] = array('id','DESC');
		$list = $this->contact_model->get_list($input);
		$this->data['list'] = $list;

		//Lấy nội dung của biến message
		$message               = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view


		$this->data['temp'] ='admin/contact/index';
		$this->load->view('admin/main', $this->data);
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

		//Lấy thông tin của quản trị viên cần chỉnh sửa
		$info = $this->contact_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại nội dung này');
			redirect(admin_url('admin'));
		}

		$this->data['info']  = $info;

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('status','Trạng Thái','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$status       = $this->input->post('status');				

				$data = array(
						'status'     => $status
					);


					if($this->contact_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Chỉnh sửa dữ liệu thành công');
					}else{
						$this->session->set_flashdata('message','Không chỉnh sửa dữ liệu thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					redirect(admin_url('contact'));
				}

		}
		$this->data['temp']  ='admin/contact/edit';
		$this->load->view('admin/main', $this->data);
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