<?php  
Class Home extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->model('site_info_model');
		$this->load->model('slider_model');
		$this->load->model('news_model');
		$this->load->model('catalog_model');
		$this->load->model('hot_service_model');
		$this->load->model('video_model');
		$this->load->model('before_after_model');
		$this->load->model('slider_news_model');
		$this->load->model('news_model');
		$this->load->model('doctor_slider_model');
	}

 
	function index_desktop()
	{
		// $key = $this->input->get('s');
		// $this->data['key'] = trim($key);

		// if(isset($key)){ //Nếu tồn tại tìm kiếm thì chuyển thành layout tìm kiếm
			
		// 	$input = array();
		// 	$input['where'] = array('status' => '0','catalog_status' => '0');
		// 	$input['like']	= array('name', $key);
		// 	$input['order'] = array('id','desc');

		// 	$total_rows = $this->news_model->get_total($input);
		// 	$this->data['total_rows'] = $total_rows;
		// 	//load ra thư viện phân trang
		// 	$this->load->library('pagination');
		// 	$config =  array();
		// 	$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
		// 	$config['base_url']    = base_url('s='.$key);// link hiển thị ra dữ liệu danh sách sản phẩm.
		// 	$config['per_page']    = '9999'; // Số lượng sản phẩm hiển thị trên từng trang.
		// 	$config['uri_segment'] = '4'; // phân đoạn hiển thị ra số trang trên url.
		// 	$config['pre_link']      	= '««';
		// 	$config['next_link']     	= '»';
		// 	$config['first_link']    	= '««';
		// 	$config['last_link']     	= '»»';
		// 	$config['cur_tag_open']  	=  '<span aria-current="page" class="page-numbers current">';
		// 	$config['cur_tag_close'] 	=  '</span>';

		// 	//Khởi tạo cấu hình phân trang
		// 	$this->pagination->initialize($config);

		// 	$segment = $this->uri->segment(4);
		// 	$segment = intval($segment);

			
		// 	$input['limit'] = array($config['per_page'], $segment);

			
		// 	$list = $this->news_model->get_list($input);
		// 	$this->data['list'] = $list;

		// 	//Danh sách dịch vụ / danh mục liên quan
		// 		$input_relate_list = array();
		// 		$input_relate_list['where'] = array('status' => '0', 'url_status' => '0','parent_id' => '0','catalog_type' => '0');
		// 		$input_relate_list['order'] = array('sort_order','asc');
		// 		$relate_list = $this->catalog_model->get_list($input_relate_list);
		// 		$this->data['relate_list'] 	= $relate_list;

		// 	//Danh sách bài viết liên quan
		// 		$input_relate_news = array();
		// 		$input_relate_news['where'] = array('status' => '0','catalog_status' => '0');
		// 		$this->db->order_by('views','desc');
		// 		$most_views_relate_news = $this->news_model->get_list($input_relate_news);
		// 		$this->data['most_views_relate_news'] = $most_views_relate_news;
		// 		$this->db->order_by('id','desc');
		// 		$new_relate_news = $this->news_model->get_list($input_relate_news);
		// 		$this->data['new_relate_news'] = $new_relate_news;
			
		// 	//Lấy danh sách banner danh mục liên quan
		// 		$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
					
		// 		//Lấy danh sách banner được gán vào $info
		// 		$input_banner_list_of_info = array();
		// 		$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1');
		// 		$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
		// 		foreach($banner_list_of_info as $row){
		// 			$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
		// 		}

		// 		if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
		// 			$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
		// 			$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
		// 			$this->data['banner_of_this_info'] = $banner_of_this_info;
		// 		}

		// 	$this->data['temp'] = 'site/desktop/home/search';
		// 	$this->load->view('site/desktop/layout', $this->data);
		// }else{ // Nếu không thì chạy trang chủ như bình thường

		// 	$input_slider = array();
		// 	$input_slider['where'] = array('status' => '0','type' => '0');
		// 	$input_slider['order'] = array('sort_order','asc');
		// 	$slider_list = $this->slider_model->get_list($input_slider);
		// 	$this->data['slider_list'] = $slider_list;
			
		// 	$input_hot_service = array();
		// 	$input_hot_service['where'] = array('status' => '0');
		// 	$input_hot_service['order'] = array('sort_order','asc');
		// 	$hot_service_list = $this->hot_service_model->get_list($input_hot_service);
		// 	$this->data['hot_service_list'] = $hot_service_list;

		// 	$input_video_list = array();
		// 	$input_video_list['where'] = array('status' => '0');
		// 	$input_video_list['order'] = array('sort_order','asc');
		// 	$video_list = $this->video_model->get_list($input_video_list);
		// 	$this->data['video_list'] = $video_list;

		// 	$input_before_after = array();
		// 	$input_before_after['where'] = array('status' => '0');
		// 	$input_before_after['order'] = array('sort_order', 'asc');
		// 	$before_after_list = $this->before_after_model->get_list($input_before_after);
		// 	$this->data['before_after_list'] = $before_after_list;

		// 	$input_slider_news = array();
		// 	$input_slider_news['where'] = array('status' => '0');
		// 	$input_slider_news['order'] = array('sort_order','asc');
		// 	$input_slider_news['limit'] = array('4','0');
		// 	$slider_news_list = $this->slider_news_model->get_list($input_slider_news);
		// 	$this->data['slider_news_list'] = $slider_news_list;

		// 	$input_doctor_slider_list = array();
		// 	$input_doctor_slider_list['where'] 	= array('status' => '0');
		// 	$input_doctor_slider_list['order'] 	= array('sort_order','desc');
		// 	$doctor_slider_list = $this->doctor_slider_model->get_list($input_doctor_slider_list);
		// 	$this->data['doctor_slider_list']	= $doctor_slider_list;


		// 	//Lấy danh sách danh mục không hiển thị trên Menu
		// 	//Kiểm tra catalog có danh mục con hay không - nếu có thì gọi ra, kiểm tra và sắp xếp
		// 	$input_catalog = array();
		// 	$input_catalog['where'] = array('parent_id' => 0, 'status' => 0, 'catalog_type' => 0, 'menu_status' => '1'); // Chọn các danh mục gốc có parent_id = 0 (khác 0 thì là danh mục con) và menu_stutus = 0 (nghĩa là cho hiện lên menu, khác 0 thì không hiện)
		// 	$input_catalog['order'] = array('sort_order','ASC');//Dịch: $slider_list['order'] là hàm điều kiện; 'view' là tên cột sắp xếp theo giá trị, 'ASC' là sắp xếp từ thấp -> cao.
		// 	$catalog_news_list = $this->catalog_model->get_list($input_catalog);
		// 	foreach ($catalog_news_list as $row)
		// 	{
		// 		$input['where'] = array('catalog_id' => $row->id, 'status' => 0, 'catalog_status' => 0);
		// 		$input['order'] = array('sort_order','ASC');
		// 		$news = $this->news_model->get_list($input);
		// 		$row->news = $news;
		// 	}
		// 	$this->db->where_in('status' == 0);
		// 	$this->data['catalog_news_list'] = $catalog_news_list; 

		// 	//Lấy danh sách bài viết trên website
		// 	$input_news_list = array();
		// 	$input_news_list['where'] = array('status' => '0','catalog_status' => '0');
		// 	$input_news_list['order'] = array('sort_order','asc');
		// 	$this->db->order_by('id desc');
		// 	$news_list = $this->news_model->get_list($input_news_list);
		// 	$this->data['news_list'] = $news_list;

		// 	$this->data['temp'] = 'site/desktop/home/index';
		// 	$this->load->view('site/desktop/layout', $this->data);
		// }

			$input_slider = array();
			$input_slider['where'] = array('status' => '0','type' => '0');
			$input_slider['order'] = array('sort_order','asc');
			$slider_list = $this->slider_model->get_list($input_slider);
			$this->data['slider_list'] = $slider_list;
			
			$input_hot_service = array();
			$input_hot_service['where'] = array('status' => '0');
			$input_hot_service['order'] = array('sort_order','asc');
			$hot_service_list = $this->hot_service_model->get_list($input_hot_service);
			$this->data['hot_service_list'] = $hot_service_list;

			$input_video_list = array();
			$input_video_list['where'] = array('status' => '0');
			$input_video_list['order'] = array('sort_order','asc');
			$video_list = $this->video_model->get_list($input_video_list);
			$this->data['video_list'] = $video_list;

			$input_before_after = array();
			$input_before_after['where'] = array('status' => '0');
			$input_before_after['order'] = array('sort_order', 'asc');
			$before_after_list = $this->before_after_model->get_list($input_before_after);
			$this->data['before_after_list'] = $before_after_list;

			$input_slider_news = array();
			$input_slider_news['where'] = array('status' => '0');
			$input_slider_news['order'] = array('sort_order','asc');
			$input_slider_news['limit'] = array('4','0');
			$slider_news_list = $this->slider_news_model->get_list($input_slider_news);
			$this->data['slider_news_list'] = $slider_news_list;

			$input_doctor_slider_list = array();
			$input_doctor_slider_list['where'] 	= array('status' => '0');
			$input_doctor_slider_list['order'] 	= array('sort_order','desc');
			$doctor_slider_list = $this->doctor_slider_model->get_list($input_doctor_slider_list);
			$this->data['doctor_slider_list']	= $doctor_slider_list;


			//Lấy danh sách danh mục không hiển thị trên Menu
			//Kiểm tra catalog có danh mục con hay không - nếu có thì gọi ra, kiểm tra và sắp xếp
			$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => 0, 'status' => 0, 'catalog_type' => 0, 'menu_status' => '1'); // Chọn các danh mục gốc có parent_id = 0 (khác 0 thì là danh mục con) và menu_stutus = 0 (nghĩa là cho hiện lên menu, khác 0 thì không hiện)
			$input_catalog['order'] = array('sort_order','ASC');//Dịch: $slider_list['order'] là hàm điều kiện; 'view' là tên cột sắp xếp theo giá trị, 'ASC' là sắp xếp từ thấp -> cao.
			$catalog_news_list = $this->catalog_model->get_list($input_catalog);
			foreach ($catalog_news_list as $row)
			{
				$input['where'] = array('catalog_id' => $row->id, 'status' => 0, 'catalog_status' => 0);
				$input['order'] = array('sort_order','ASC');
				$news = $this->news_model->get_list($input);
				$row->news = $news;
			}
			$this->db->where_in('status' == 0);
			$this->data['catalog_news_list'] = $catalog_news_list; 

			//Lấy danh sách bài viết trên website
			$input_news_list = array();
			$input_news_list['where'] = array('status' => '0','catalog_status' => '0');
			$input_news_list['order'] = array('sort_order','asc');
			$this->db->order_by('id desc');
			$news_list = $this->news_model->get_list($input_news_list);
			$this->data['news_list'] = $news_list;

			//Lưu cache 180 phút - 3 giờ 
			//$this->output->cache('180');

			$this->data['temp'] = 'site/desktop/home/index';
			$this->load->view('site/desktop/layout', $this->data);
	}

	function index_mobile()
	{
		$this->data['temp'] = 'site/mobile/home/index';
		$this->load->view('site/mobile/layout', $this->data);
	}

	function contact_desktop(){
		//load ra thư viện library
		$this->load->library('form_validation');
		$this->load->helper('form');

		//check dữ liệu input lên database
		if($this->input->post())
		{
			$this->form_validation->set_rules('contact_name','Tên khách hàng','required');
			// Nhập Liệu chính xác
			if($this->form_validation->run())
			{
				// Thêm vào cơ sở dữ liệu
				$name       = $this->input->post('contact_name');
				$phone      = $this->input->post('contact_phone');
				$content    = $this->input->post('contact_content');
				

				//Lưu dữ liệu cần thêm vào bảng
				$data = array(
						'name'       => $name,
						'phone'      => $phone,
						'content'    => $content,
						'created'    => now()
					);

				//Thêm mới vào csdl
				if($this->contact_model->create($data))
				{
					redirect(base_url('thank-you'));
				}
				
			}
		}
		$this->data['temp'] = 'site/desktop/home/contact';
		$this->load->view('site/desktop/layout', $this->data);
	}

	function contact_mobile(){
		$this->load->view('site/mobile/layout', $this->data);
	}


	
	function error_desktop()
	{	
		$this->data['temp'] = 'site/desktop/home/404';

		$this->load->view('site/desktop/layout', $this->data);
	}

	function error_mobile()
	{	
		$this->data['temp'] = 'site/mobile/home/404';
		$this->load->view('site/mobile/layout', $this->data);
	}

	function search_desktop(){
		$key = $this->input->get('s');
		$this->data['key'] = trim($key);

		$input = array();
		$input['where'] = array('status' => '0','catalog_status' => '0');
		$input['like']	= array('name', $key);
		$input['order'] = array('id','desc');

		$total_rows = $this->news_model->get_total($input);
		$this->data['total_rows'] = $total_rows;
		//load ra thư viện phân trang
		$this->load->library('pagination');
		$config =  array();
		$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
		$config['base_url']    = base_url('home/search_desktop?s='.$key);// link hiển thị ra dữ liệu danh sách sản phẩm.
		$config['per_page']    = '9999'; // Số lượng sản phẩm hiển thị trên từng trang.
		$config['uri_segment'] = '4'; // phân đoạn hiển thị ra số trang trên url.
		$config['pre_link']      	= '««';
		$config['next_link']     	= '»';
		$config['first_link']    	= '««';
		$config['last_link']     	= '»»';
		$config['cur_tag_open']  	=  '<span aria-current="page" class="page-numbers current">';
		$config['cur_tag_close'] 	=  '</span>';

		//Khởi tạo cấu hình phân trang
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		
		$input['limit'] = array($config['per_page'], $segment);

		
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;

		//Danh sách dịch vụ / danh mục liên quan
			$input_relate_list = array();
			$input_relate_list['where'] = array('status' => '0', 'url_status' => '0','parent_id' => '0','catalog_type' => '0');
			$input_relate_list['order'] = array('sort_order','asc');
			$relate_list = $this->catalog_model->get_list($input_relate_list);
			$this->data['relate_list'] 	= $relate_list;

		//Danh sách bài viết liên quan
			$input_relate_news = array();
			$input_relate_news['where'] = array('status' => '0','catalog_status' => '0');
			$this->db->order_by('views','desc');
			$most_views_relate_news = $this->news_model->get_list($input_relate_news);
			$this->data['most_views_relate_news'] = $most_views_relate_news;
			$this->db->order_by('id','desc');
			$new_relate_news = $this->news_model->get_list($input_relate_news);
			$this->data['new_relate_news'] = $new_relate_news;
		
		//Lấy danh sách banner danh mục liên quan
			$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
				
			//Lấy danh sách banner được gán vào $info
			$input_banner_list_of_info = array();
			$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1');
			$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
			foreach($banner_list_of_info as $row){
				$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
			}

			if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
				$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
				$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
				$this->data['banner_of_this_info'] = $banner_of_this_info;
			}

		$this->data['temp'] = 'site/desktop/home/search';
		$this->load->view('site/desktop/layout', $this->data);
		
	}

	function search_mobile(){
		$this->load->view('site/mobile/layout', $this->data);
	}

	function thankyou_desktop()
	{	
		$id_site_info = 1;
		$site_info = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;
		
		$success_scripts 	= $site_info->scripts_conversation;
		$this->data['success_scripts'] = $success_scripts;



		//Danh sách dịch vụ / danh mục liên quan
			$input_relate_list = array();
			$input_relate_list['where'] = array('status' => '0', 'url_status' => '0','parent_id' => '0','catalog_type' => '0');
			$input_relate_list['order'] = array('sort_order','asc');
			$relate_list = $this->catalog_model->get_list($input_relate_list);
			$this->data['relate_list'] 	= $relate_list;

		//Danh sách bài viết liên quan
			$input_relate_news = array();
			$input_relate_news['where'] = array('status' => '0','catalog_status' => '0');
			$this->db->order_by('views','desc');
			$most_views_relate_news = $this->news_model->get_list($input_relate_news);
			$this->data['most_views_relate_news'] = $most_views_relate_news;
			$this->db->order_by('id','desc');
			$new_relate_news = $this->news_model->get_list($input_relate_news);
			$this->data['new_relate_news'] = $new_relate_news;
		
		//Lấy danh sách banner danh mục liên quan
			$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
				
			//Lấy danh sách banner được gán vào $info
			$input_banner_list_of_info = array();
			$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1');
			$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
			foreach($banner_list_of_info as $row){
				$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
			}

			if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
				$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
				$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
				$this->data['banner_of_this_info'] = $banner_of_this_info;
			}

	

		$this->data['temp'] = 'site/desktop/home/thankyou';

		$this->load->view('site/desktop/layout', $this->data);
	}

	function thankyou_mobile()
	{	
		$id_site_info = 1;
		$site_info = $this->site_info_model->get_info($id_site_info);
		$this->data['site_info'] = $site_info;
		
		$success_scripts 	= $site_info->scripts_conversation;
		$this->data['success_scripts'] = $success_scripts;
		
		$this->data['temp'] = 'site/mobile/home/thankyou';
		$this->load->view('site/mobile/layout', $this->data);
	}
	
	


	function sitemap() 
	{
		//Truyền các giá trị vào site map
			//Lấy danh sách catalog
			$input_catalog_list = array();
			$input_catalog_list['where'] 	= array('status' => '0','parent_id' => '0');
			$input_catalog_list['order'] 	= array('sort_order','asc');
			$catalog_list 					= $this->catalog_model->get_list($input_catalog_list);
			foreach ($catalog_list as $row)
				{
					$input['where'] 	= array('parent_id' => $row->id, 'status' => 0);
					$input['order'] 	= array('sort_order','ASC');
					$subs 				= $this->catalog_model->get_list($input);
					$row->subs 			= $subs;

					foreach($subs as $subs)
					{
						$input_subs['where'] 	= array('parent_id' => $subs->id, 'status' => 0);
						$input_subs['order'] 	= array('sort_order','ASC');
						$subss 					= $this->catalog_model->get_list($input_subs);
						$subs->subss 			= $subss;
					}
				}
			$this->data['catalog_list']  		= $catalog_list;
			
			//Lấy danh sách bài viết / tin tức / bác sĩ
			$input_news_list = array();
			$input_news_list['where'] 	= array('status' => '0','catalog_status' => '0');
			$input_news_list['order'] 	= array('id','desc');
			$news_list = $this->news_model->get_list($input_news_list);
			$this->data['news_list'] 	= $news_list;

		//Load view
	   	$this->load->view('sitemap', $this->data);
	}

	function clone_job() 
	{
		//Truyền các giá trị vào site map
			//Lấy danh sách catalog
			$input_catalog_list = array();
			$input_catalog_list['where'] 	= array('status' => '0','parent_id' => '0');
			$input_catalog_list['order'] 	= array('sort_order','asc');
			$catalog_list 					= $this->catalog_model->get_list($input_catalog_list);
			foreach ($catalog_list as $row)
				{
					$input['where'] 	= array('parent_id' => $row->id, 'status' => 0);
					$input['order'] 	= array('sort_order','ASC');
					$subs 				= $this->catalog_model->get_list($input);
					$row->subs 			= $subs;

					foreach($subs as $subs)
					{
						$input_subs['where'] 	= array('parent_id' => $subs->id, 'status' => 0);
						$input_subs['order'] 	= array('sort_order','ASC');
						$subss 					= $this->catalog_model->get_list($input_subs);
						$subs->subss 			= $subss;
					}
				}
			$this->data['catalog_list']  		= $catalog_list;
			
			//Lấy danh sách bài viết / tin tức / bác sĩ
			$input_news_list = array();
			$input_news_list['where'] 	= array('status' => '0','catalog_status' => '0');
			$input_news_list['order'] 	= array('id','desc');
			$news_list = $this->news_model->get_list($input_news_list);
			$this->data['news_list'] 	= $news_list;

		//Load view
	   	$this->load->view('clone_job', $this->data);
	}

}