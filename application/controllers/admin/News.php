<?php 
Class News extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_info_model');
        $this->load->model('catalog_model');
        $this->load->model('news_model');
        

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
        $input_catalog['where'] = array('parent_id' => '0' , 'catalog_type' => '0'); // Mặc định là dạng danh mục không có nội dung content, cho phép truy cập url & là dạng danh mục nội dung
        $input_catalog['order'] = array('sort_order','asc');
        $catalog_list = $this->catalog_model->get_list($input_catalog);
        foreach ($catalog_list as $row)
        {
            $input['where'] = array('parent_id' => $row->id, 'catalog_type' => '0');
            $input['order'] = array('sort_order','asc');
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;

            foreach($subs as $subs)
            {
                $input_subs['where'] = array('parent_id' => $subs->id, 'catalog_type' => '0');
                $input_subs['order'] = array('sort_order','asc');
                $subss = $this->catalog_model->get_list($input_subs);
                $subs->subss = $subss;
            }
        }
        $this->data['catalog_list'] = $catalog_list; 

        $input_catalog_video = array();
        $input_catalog_video['where'] = array('catalog_type' => '1'); // Mặc định là dạng danh mục video
        $input_catalog_video['order'] = array('sort_order','asc');
        $catalog_video_list  = $this->catalog_model->get_list($input_catalog_video);
        $this->data['catalog_video_list'] = $catalog_video_list;

        $input_news = array();
        $input_news['order'] = array('id','desc');
        $list  = $this->news_model->get_list($input_news);
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


		$this->data['temp'] ='admin/news/index';
		$this->load->view('admin/main', $this->data);
	}
	
	/*
	*Hàm chỉnh sửa slider news
	*/

	function edit_slider_news_modal(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('slider_news_catalog_id','slider_news_catalog_id','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				$id						= '1';
				$id   					= intval($id);
				$info 					= $this->site_info_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$slider_news_catalog_id  = $this->input->post('slider_news_catalog_id');

					$data = array(
						'slider_news_catalog_id' => $slider_news_catalog_id,
					);

					if($this->site_info_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('news')); 
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
			$this->form_validation->set_rules('alias','Tên','required');
			$this->form_validation->set_rules('catalog_id','danh mục dịch vụ','required');

			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name             		= $this->input->post('name');
                $alias             		= $this->input->post('alias');
                $catalog_id             = $this->input->post('catalog_id');
                //$catalog_video_id       = $this->input->post('catalog_video_id');
                $status 				= $this->input->post('status');
                $sort_order				= $this->input->post('sort_order');
				//$video_link				= $this->input->post('video_link');
				$meta_desc				= $this->input->post('meta_desc');
				$meta_key				= $this->input->post('meta_key');
				$content 				= $this->input->post('content');

				if($video_link == ''){ 
					$catalog_video_id 	= '0'; // Nếu không có đường dẫn video, thì danh mục của video = '0' -- không có
				}

				if($catalog_id == '0'){
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công do không gán danh mục dịch vụ cho bài viết');
					redirect(admin_url('news')); 
				}

                //Lấy tên file ảnh minh họa được upload lên
				$this->load->library('upload_library');
                $upload_path = './upload/news';
                
                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

				$image_link ='';
				if(isset($upload_data_image['file_name']))
				{
					$image_link = $upload_data_image['file_name'];
				}

				$upload_data_image_social = $this->upload_library->upload($upload_path, 'social_image_link');

				$social_image_link ='';
				if(isset($upload_data_image_social['file_name']))
				{
					$social_image_link = $upload_data_image_social['file_name'];
				}
				
                $data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'catalog_id'			=> $catalog_id,
                        //'catalog_video_id'		=> $catalog_video_id,
                        'status'				=> $status,
                        'sort_order'			=> $sort_order,
                        //'video_link'			=> $video_link,
                        'meta_desc'				=> $meta_desc,
                        'meta_key'				=> $meta_key,
                        'content'				=> $content,
                        'image_link'			=> $image_link,
                        'social_image_link'		=> $social_image_link,
                        'created'				=> now(),
                    );
                
                if($this->news_model->create($data))
				{
					//Tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//Chuyển tới trang danh sách quản trị viên
				
				redirect(admin_url('news')); 
				
				
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
				$info 					= $this->news_model->get_info($id);
				if(isset($info)){
					// Thêm vào cơ sở dữ liệu
					$name             		= $this->input->post('name');
	                $alias             		= $this->input->post('alias');
	                $catalog_id             = $this->input->post('catalog_id');
	                //$catalog_video_id       = $this->input->post('catalog_video_id');
	                $status 				= $this->input->post('status');
	                $sort_order				= $this->input->post('sort_order');
					//$video_link				= $this->input->post('video_link');
					$meta_desc				= $this->input->post('meta_desc');
					$meta_key				= $this->input->post('meta_key');
					$content 				= $this->input->post('content');

					if($video_link == ''){ // Nếu không có đường dẫn video, thì danh mục của video = '0' -- không có
						$catalog_video_id = '0';
					}

					//Lấy tên file ảnh minh họa được upload lên
					$this->load->library('upload_library');
	                $upload_path = './upload/news';
	                
	                $upload_data_image = $this->upload_library->upload($upload_path, 'image_link');

					$image_link ='';
					if(isset($upload_data_image['file_name']))
					{
						$image_link = $upload_data_image['file_name'];
					}

					$upload_data_image_social = $this->upload_library->upload($upload_path, 'social_image_link');

					$social_image_link ='';
					if(isset($upload_data_image_social['file_name']))
					{
						$social_image_link = $upload_data_image_social['file_name'];
					}

					
					
					$data = array(
						'name'                 	=> $name,
                        'alias'                 => $alias,
                        'catalog_id'			=> $catalog_id,
                        //'catalog_video_id'		=> $catalog_video_id,
                        'status'				=> $status,
                        'sort_order'			=> $sort_order,
                        //'video_link'			=> $video_link,
                        'meta_desc'				=> $meta_desc,
                        'meta_key'				=> $meta_key,
                        'content'				=> $content,
					);
					
					if($image_link != '')
					{
						$image_link_of_this_info = './upload/news/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($image_link_of_this_info); // Xóa ảnh cũ
						$data['image_link'] = $image_link;
					}
					
					if($social_image_link != '')
					{
						$social_image_link_of_this_info = './upload/news/'.$info->social_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
						unlink($social_image_link_of_this_info); // Xóa ảnh cũ
						$data['social_image_link'] = $social_image_link;
					}	
					


					if($this->news_model->update($id, $data))
					{
						//Tạo ra nội dung thông báo
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
						
					}else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
					}
					//Chuyển tới trang danh sách quản trị viên
					
					redirect(admin_url('news')); 
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
		$info = $this->news_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('news'));
		}

		//Thực hiện xóa
		$image_link_of_this_info = './upload/news/'.$info->image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($image_link_of_this_info); // Xóa ảnh

		$social_image_link_of_this_info = './upload/news/'.$info->social_image_link; // Tạo vị trí ảnh đại diện cũ -- Tương tự với image_list thì foreach nó ra -- để xóa
		unlink($social_image_link_of_this_info); // Xóa ảnh

		$this->news_model->delete($id); // Xóa dữ liệu trong CSDL
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('news'));
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