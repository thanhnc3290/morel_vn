<?php 
Class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

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
		$input               = array();
		$list                = $this->admin_model->get_list($input);
		$this->data['list']  = $list;

		$total               = $this->admin_model->get_total();
		$this->data['total'] = $total;

		//Lấy ra nội dung của biến message
		$message               = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] ='admin/admin/index';
		$this->load->view('admin/main', $this->data);
	}
	/*
	*Kiểm tra username đã tồn tại chưa
	*/
	function check_username()
	{
		$username = $this->input->post('username');
		$where    = array('username' => $username);
		//Kiểm tra biến 'username' trong cơ sở dữ liệu
		if($this->admin_model->check_exists($where))
		{
			//Trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return FALSE;
		}
		return TRUE;
	}


	/*
	*Hàm thêm mới admin
	*/

	function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('username','User Name','required|min_length[3]|callback_check_username');
			$this->form_validation->set_rules('password','Password','required|min_length[3]');
			$this->form_validation->set_rules('re_password','Re Password','required|matches[password]');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$status   = $this->input->post('status');
				$group_id = $this->input->post('group_id');

				$data = array(
						'username' => $username,
						'group_id' => $group_id,
						'status'   => $status,
						'password' => md5($password)
					);
				if($this->admin_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Không thêm mới dữ liệu thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				redirect(admin_url('admin'));
			}
		}

		$this->data['temp']  ='admin/admin/add';
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
		$info = $this->admin_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại quản trị viên này');
			redirect(admin_url('admin'));
		}

		$this->data['info']  = $info;

		if($this->input->post())
		{
			$this->form_validation->set_rules('status','trạng thái','required');

			$password = $this->input->post('password');
			if($password)
			{
			$this->form_validation->set_rules('password','Password','required|min_length[3]');
			$this->form_validation->set_rules('re_password','Re Password','required|matches[password]');
			}
				if($this->form_validation->run())
				{
					// Sửa thông tin trên cơ sở dữ liệu
					$status   = $this->input->post('status');
					$group_id = $this->input->post('group_id');


					$data = array(
							'status'   => $status,
							'group_id' => $group_id
						);

					// Nếu thay đổi mật khẩu thì mới nhập dữ liệu
					if($password)
					{
						$data['password']= md5(password);
					}

					if($this->admin_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Chỉnh sửa dữ liệu thành công');
					}else{
						$this->session->set_flashdata('message','Không chỉnh sửa dữ liệu thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					redirect(admin_url('admin'));
				}

		}
		$this->data['temp']  ='admin/admin/edit';
		$this->load->view('admin/main', $this->data);
	}

	/*
	*Hàm xóa thông tin admin
	*/
	function delete()
	{
		//Lấy ID của quản trị viên cần xóa
		$id   = $this->uri->rsegment('3');
		$id   = intval($id);

		//Lấy thông tin của quản trị viên cần xóa
		$info = $this->admin_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại quản trị viên này');
			redirect(admin_url('admin'));
		}

		//Thực hiện xóa
		$this->admin_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('admin'));
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