<?php 
Class Project extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('project_model');
        

		//Lấy thông tin website
		$id_site_info = '1';
		$site_info    = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;

		//Lấy thông tin admin
		$admin_position = $this->session->userdata('group_id');
		$this->data['admin_position'] = $admin_position;

		$admin_login_id = $this->session->userdata('id');
        $this->data['admin_login_id'] = $admin_login_id;
        
        

        $input_project = array();
        $input_project['order'] = array('id','desc');
        $list  = $this->project_model->get_list($input_project);
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


		$this->data['temp'] ='admin/project/index';
		$this->load->view('admin/main', $this->data);
	}

    function add()
    {
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
                $status                 = $this->input->post('status');
                $sort_order             = $this->input->post('sort_order');
                $meta_desc              = $this->input->post('meta_desc');
                $meta_key               = $this->input->post('meta_key');
                $content                = $this->input->post('content');

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/project';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

                //Upload các ảnh kèm theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);
				
                $data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'status'                => $status,
                        'sort_order'            => $sort_order,
                        'meta_desc'             => $meta_desc,
                        'meta_key'              => $meta_key,
                        'content'               => $content,

                        'image_link'            => $image_link,
                        'image_list'            => $image_list,
                    );
                
                if($this->project_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('project')); 
				
				
			}

		}
        $this->data['temp'] ='admin/project/add';
		$this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        //Lấy ID của sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$info = $this->project_model->get_info($id);
		if(!$info) redirect();

		$this->data['id'] = $id;
		$this->data['info'] = $info;
        
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
                $status                 = $this->input->post('status');
                $sort_order             = $this->input->post('sort_order');
                $meta_desc              = $this->input->post('meta_desc');
                $meta_key               = $this->input->post('meta_key');
                $content                = $this->input->post('content');

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/project';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

                //Upload các ảnh kèm theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);

                $data = array(
                    'name'                 	=> $name,
                    'alias'                 => $alias,
                    'status'                => $status,
                    'sort_order'            => $sort_order,
                    'meta_desc'             => $meta_desc,
                    'meta_key'              => $meta_key,
                    'content'               => $content,

                );

                    if($image_link != '')
					{
						$image_link_of_this_info = './upload/project/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}
                    
                    if(($image_list !== '[]'))
                    {
                        $data['image_list'] = $image_list;

                        $image_list_to_delete = json_decode($info->image_list);
                        if(is_array($image_list_to_delete))
                        {  
                            foreach ($image_list_to_delete as $img) 
                            {
                                $image_link = './upload/project/'.$img;
                                if(file_exists($image_link))
                                {
                                    unlink($image_link);
                                }
                            }
                        }
                    }

					
                
                if($this->project_model->update($id,$data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('project')); 
				
				
			}

		}
        $this->data['temp'] ='admin/project/edit';
		$this->load->view('admin/main', $this->data);
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
		$info = $this->project_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('project'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/project/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

        
        if(is_array(json_decode($info->image_list))){
            $image_list_to_delete =json_decode($info->image_list);
            foreach($image_list_to_delete as $img){
                $image_link = './upload/project/'.$img;
                if(file_exists($image_link))
                {
                        unlink($image_link);
                }
            }
        }

		$this->project_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('project'));
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