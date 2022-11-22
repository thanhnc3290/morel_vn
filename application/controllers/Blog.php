<?php  
Class Blog extends MY_Controller
{
	/*
	* Hàm khởi tạo
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->model('site_info_model');
		$this->load->model('catalog_model');
		$this->load->model('news_model');
		$this->load->model('slider_model');
	}

	function video_index_desktop(){
		$input_list = array();
		$input_list['where'] = array('status' => '0','catalog_type' => '1');//Chỉ lấy các catalog video
		$input_list['order'] = array('sort_order','asc');
		$list = $this->catalog_model->get_list($input_list);
		foreach($list as $row){ //Lấy danh sách bài viết video thuộc danh mục
			$input_news_of_row = array();
			$input_news_of_row['where'] = array('status' => '0', 'catalog_video_id' => $row->id);
			$input_news_of_row['order'] = array('id','desc');
			$input_news_of_row['limit'] = array('5','0');
			$subs = $this->news_model->get_list($input_news_of_row);
			$row->subs = $subs;
		}
		$this->data['list'] = $list;

		$this->data['temp'] = 'site/desktop/blog/index_video';
		$this->load->view('site/desktop/layout', $this->data);
	}

	function video_index_mobile(){

	}

	function catalog_desktop()
	{
		//Lấy ID của danh mục sản phẩm
		$id = intval($this->uri->rsegment(3));
		$info = $this->catalog_model->get_info($id);

		if(!$info){
			redirect(base_url('404_override'));
		}

		if($info->status !== '0'){
			redirect(base_url('404_override'));
		}

		if($info->url_status !== '0'){
			redirect(base_url('404_override'));
		}
		//Phần lấy thông tin chung

		$this->data['info'] = $info;

		//Lấy ảnh social của $info
		$social_image_of_this_info = base_url('upload/catalog/'.$info->social_image_link);
		$this->data['social_image_of_this_info'] = $social_image_of_this_info;

		//Cập nhật lượt views
		$views = $info->views;
		$data = array(
			'views' => $views + 1,
		);
		$this->catalog_model->update($info->id,$data);

		//Kiểm tra xem đây là danh mục tin tức hay danh mục Video
		if($info->catalog_type == '0'){//Nếu là danh mục tin tức
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '10'; // Số lượng sản phẩm hiển thị trên từng trang.
				$config['uri_segment'] = '4'; // phân đoạn hiển thị ra số trang trên url.
				$config['pre_link']      	= '««';
				$config['next_link']     	= '»';
				$config['first_link']    	= '««';
				$config['last_link']     	= '»»';
				$config['cur_tag_open']  	=  '<span aria-current="page" class="page-numbers current">';
				$config['cur_tag_close'] 	=  '</span>';
				$config['num_tag_open']		= '<span class="page-numbers">' ;
				$config['num_tag_close']	= '</span>';
				$config['prev_tag_open']	= '<span class="prev page-numbers">';
				$config['prev_tag_close']	= '</span>';
				$config['next_tag_open']	= '<span class="next page-numbers">';
				$config['next_tag_close']	= '</span>';
				$config['first_tag_open']	= '<span class="page-numbers">';
				$config['first_tag_close']	= '</span>';
				$config['last_tag_open']	= '<span class="page-numbers">';
				$config['last_tag_close']	= '</span>';

				//Khởi tạo cấu hình phân trang
				$this->pagination->initialize($config);

				$segment = $this->uri->segment(4);
				$segment = intval($segment);

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;


			//Lấy danh mục - dịch vụ liên quan
				//Kiểm tra xem có danh mục nào nằm dưới $info hay không
				$input_child_catalog = array();
				$input_child_catalog['where'] = array('parent_id' => $info->id);
				$child_catalog_list = $this->catalog_model->get_list($input_child_catalog);
				if(!empty($child_catalog_list)){ //Nếu có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->id);
					$input_relate_list['order'] = array('sort_order','asc');
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}else{ //Nếu không có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->parent_id);
					$input_relate_list['order'] = array('sort_order','asc');
					$this->db->where('id !=',$info->id);
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}
			
			//Lấy bài viết liên quan tới danh mục
				$input_relate_news = array(); // Tạo biến danh sách bài viết liên quan tổng

				//Kiểm tra có bài viết thuộc danh mục này không -- Nếu có thì lấy trước & cho hiển thị trước -- Gộp vào $input_relate_news
				$input_most_views_child_news = array();
				$input_most_views_child_news['where'] = array('catalog_id' => $info->id, 'status' => '0', 'catalog_status' => '0');
				$input_most_views_child_news['order'] = array('views','desc');
				$relate_most_views_list = $this->news_model->get_list($input_most_views_child_news);
				foreach($relate_most_views_list as $row){
					$input_relate_news[] = $row->id; //Gộp danh sách id bài viết con của $info vào $input_relate_news
				}
				
				//Tiếp tục lấy bài viết xem nhiều của các danh mục liên quan -- Gộp vào $input_relate_news
				foreach($relate_list as $row){
					$input_relate_news_of_row = array();
					$input_relate_news_of_row['where'] = array('catalog_id' => $row->id, 'status' => '0', 'catalog_status' => '0');
					$relate_news_of_row = $this->news_model->get_list($input_relate_news_of_row);
					foreach($relate_news_of_row as $news_1){
						$input_relate_news[] = $news_1->id; //Gộp danh sách id bài viết con của $row vào $input_relate_news
					}
					//Kiểm tra xem các danh mục liên quan có danh mục cha hay không 
					$input_child_catalog_of_row = array();
					$input_child_catalog_of_row['where'] = array('parent_id' => $row->id);
					$child_catalog_list_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
					foreach($child_catalog_list_of_row as $subs){
						$input_relate_news_of_subs = array();
						$input_relate_news_of_subs['where'] = array('catalog_id' => $subs->id, 'status' => '0', 'catalog_status' => '0');
						$relate_news_of_subs = $this->news_model->get_list($input_relate_news_of_subs);
						foreach($relate_news_of_subs as $news_2){
							$input_relate_news[] = $news_2->id; //Gộp danh sách id bài viết con của $subs vào $input_relate_news
						}
					}
				}
				$this->db->order_by('views','desc');
				$most_views_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - xem nhiều
				$this->data['most_views_news_relate'] = $most_views_news_relate;

				$this->db->order_by('id','desc');
				$new_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - mới nhất
				$this->data['new_news_relate'] = $new_news_relate;
			

			//Lấy banner liên quan hoặc được gán vào danh mục -- theo phương thức random
				$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
				//Lấy danh sách các banner được gán vào tất cả danh mục
				$input_banner_for_all_catalog = array();
				$input_banner_for_all_catalog['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => '0');
				$banner_for_all_catalog = $this->slider_model->get_list($input_banner_for_all_catalog);
				foreach($banner_for_all_catalog as $row){
					if(isset($row->id)){
						$id_of_banner_list[] = $row->id; //Gộp $row->id vào $id_of_banner_list
					}
				}
				//Lấy danh sách banner được gán vào $info
				$input_banner_list_of_info = array();
				$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $info->id);
				$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
				foreach($banner_list_of_info as $row){
					$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
				}
				
				//Lấy danh sách banner được gán vào danh mục cha của $info (nếu $info Nếu $info có danh mục cha)
				if($info->parent_id !== '0'){
					$parent_of_info = $this->catalog_model->get_info($info->parent_id);
					if(isset($parent_of_info->id)){ //Nếu $info có danh mục cha

						$input_banner_list_parent_of_info = array();
						$input_banner_list_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_info->id);
						$banner_list_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_info);
						foreach($banner_list_parent_of_info as $row){
							$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
						}

						//Lấy danh sách banner được gán vào danh mục cha của danh mục cha của $info (nếu $info Nếu $parent_of_info có danh mục cha)
						$parent_of_parent_of_info = $this->catalog_model->get_info($parent_of_info->parent_id);
						if(isset($parent_of_parent_of_info->id)){ //Nếu tồn tại $parent_of_parent_of_info
							$input_banner_list_parent_of_parent_of_info = array();
							$input_banner_list_parent_of_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_parent_of_info->id);
							$banner_list_parent_of_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_parent_of_info);
							foreach($banner_list_parent_of_parent_of_info as $row){
								$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
							}
						}
					}
				}
				
				if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
					$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
					$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
					$this->data['banner_of_this_info'] = $banner_of_this_info;
				}

			//Phần chọn layout để truyền ra view
			if($info->content_status == '0'){
				if($info->layout_type == '0'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_tin_tuc';
				}
				if($info->layout_type == '1'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_bac_si';
				}
				if($info->layout_type == '2'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_dich_vu';
				}
				if($info->layout_type == '999'){
					redirect($info->landingpage_url);
				}
				
			}else{
				$this->data['temp'] = 'site/desktop/blog/catalog_layout_bai_viet';
			}
		}else{//Nếu là danh mục video
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_video_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '12'; // Số lượng sản phẩm hiển thị trên từng trang.
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

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_video_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;

			$this->data['temp'] = 'site/desktop/blog/catalog_video';
		}
		
		//Lưu cache 180 phút - 3 giờ 
		$this->output->cache('180');
		
		$this->load->view('site/desktop/layout', $this->data);
	}

	function catalog_mobile()
	{

		$this->data['temp'] = 'site/mobile/blog/catalog_layout_danh_muc_tin_tuc';
		$this->load->view('site/mobile/layout', $this->data);
	}


	function news_desktop(){
		//Lấy ID của danh mục sản phẩm
		$id = intval($this->uri->rsegment(3));
		$info = $this->news_model->get_info($id);

		if(!$info){
			redirect(base_url('404_override'));
		}

		if($info->status !== '0'){
			redirect(base_url('404_override'));
		}

		if($info->catalog_status !== '0'){
			redirect(base_url('404_override'));
		}

		//Phần lấy thông tin chung
		$this->data['info'] = $info;

		//Lấy ảnh social của $info
		$social_image_of_this_info = base_url('upload/news/'.$info->social_image_link);
		$this->data['social_image_of_this_info'] = $social_image_of_this_info;

		//Cập nhật lượt views
		$views = $info->views;
		$data = array(
			'views' => $views + 1,
		);
		$this->news_model->update($info->id,$data);

		//Lấy danh mục - dịch vụ liên quan
			//Kiểm tra xem có danh mục nào nằm dưới danh mục của $info hay không
			$catalog_of_info_id = $info->catalog_id;
			$catalog_of_info 	= $this->catalog_model->get_info($catalog_of_info_id);
			$input_child_catalog = array();
			$input_child_catalog['where'] = array('parent_id' => $catalog_of_info->id);
			$child_catalog_list = $this->catalog_model->get_list($input_child_catalog);
			if(!empty($child_catalog_list)){ //Nếu có
				$input_relate_list = array();
				$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $catalog_of_info->id);
				$input_relate_list['order'] = array('sort_order','asc');
				$relate_list = $this->catalog_model->get_list($input_relate_list);
				$this->data['relate_list'] = $relate_list;
			}else{ //Nếu không có
				$input_relate_list = array();
				$input_relate_list = array();
				$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $catalog_of_info->parent_id);
				$input_relate_list['order'] = array('sort_order','asc');
				$this->db->where('id !=',$catalog_of_info->id);
				$relate_list = $this->catalog_model->get_list($input_relate_list);
				$this->data['relate_list'] = $relate_list;
			}
		
		//Lấy bài viết liên quan
			$input_relate_news = array(); // Tạo biến danh sách bài viết liên quan tổng

			//Kiểm tra có bài viết thuộc danh mục của $info này không -- Nếu có thì lấy trước & cho hiển thị trước -- Gộp vào $input_relate_news
			$input_most_views_child_news = array();
			$input_most_views_child_news['where'] = array('catalog_id' => $catalog_of_info->id, 'status' => '0', 'catalog_status' => '0');
			$input_most_views_child_news['order'] = array('views','desc');
			$relate_most_views_list = $this->news_model->get_list($input_most_views_child_news);
			foreach($relate_most_views_list as $row){
				$input_relate_news[] = $row->id; //Gộp danh sách id bài viết con của $info vào $input_relate_news
			}
			
			//Tiếp tục lấy bài viết xem nhiều của các danh mục liên quan -- Gộp vào $input_relate_news
			foreach($relate_list as $row){
				$input_relate_news_of_row = array();
				$input_relate_news_of_row['where'] = array('catalog_id' => $row->id, 'status' => '0', 'catalog_status' => '0');
				$relate_news_of_row = $this->news_model->get_list($input_relate_news_of_row);
				foreach($relate_news_of_row as $news_1){
					$input_relate_news[] = $news_1->id; //Gộp danh sách id bài viết con của $row vào $input_relate_news
				}
				//Kiểm tra xem các danh mục liên quan có danh mục cha hay không 
				$input_child_catalog_of_row = array();
				$input_child_catalog_of_row['where'] = array('parent_id' => $row->id);
				$child_catalog_list_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
				foreach($child_catalog_list_of_row as $subs){
					$input_relate_news_of_subs = array();
					$input_relate_news_of_subs['where'] = array('catalog_id' => $subs->id, 'status' => '0', 'catalog_status' => '0');
					$relate_news_of_subs = $this->news_model->get_list($input_relate_news_of_subs);
					foreach($relate_news_of_subs as $news_2){
						$input_relate_news[] = $news_2->id; //Gộp danh sách id bài viết con của $subs vào $input_relate_news
					}
				}
			}
			$this->db->order_by('views','desc');
			$this->db->where('id !=',$info->id);
			$most_views_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - xem nhiều
			$this->data['most_views_news_relate'] = $most_views_news_relate;

			$this->db->order_by('id','desc');
			$this->db->where('id !=',$info->id);
			$new_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - mới nhất
			$this->data['new_news_relate'] = $new_news_relate;

		//Lấy banner liên quan hoặc được gán vào danh mục -- theo phương thức random
			$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
			
			//Lấy danh sách banner được gán vào  danh mục của $info
			$input_banner_list_of_info = array();
			$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $catalog_of_info->id);
			$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
			foreach($banner_list_of_info as $row){
				$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
			}
			
			//Lấy danh sách banner được gán vào danh mục cha của $info (nếu $info Nếu $info có danh mục cha)
			if($catalog_of_info->parent_id !== '0'){
				$parent_of_info = $this->catalog_model->get_info($catalog_of_info->parent_id);
				if(isset($parent_of_info->id)){ //Nếu $info có danh mục cha

					$input_banner_list_parent_of_info = array();
					$input_banner_list_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_info->id);
					$banner_list_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_info);
					foreach($banner_list_parent_of_info as $row){
						$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
					}

					//Lấy danh sách banner được gán vào danh mục cha của danh mục cha của $info (nếu $info Nếu $parent_of_info có danh mục cha)
					$parent_of_parent_of_info = $this->catalog_model->get_info($parent_of_info->parent_id);
					if(isset($parent_of_parent_of_info->id)){
						$input_banner_list_parent_of_parent_of_info = array();
						$input_banner_list_parent_of_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_parent_of_info->id);
						$banner_list_parent_of_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_parent_of_info);
						foreach($banner_list_parent_of_parent_of_info as $row){
							$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
						}
					}
				}
			}
			
			if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
				$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
				$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
				$this->data['banner_of_this_info'] = $banner_of_this_info;
			}

		
		
		//Lưu cache 180 phút - 3 giờ 
		$this->output->cache('180');

		$this->data['temp'] = 'site/desktop/blog/news_layout_detail';
		$this->load->view('site/desktop/layout', $this->data);
	}

	function news_mobile(){
		$this->data['temp'] = 'site/mobile/blog/news_layout_detail';
		$this->load->view('site/mobile/layout', $this->data);
	}

	function gallery_chinh_nha_desktop(){
		//Lấy ID của danh mục sản phẩm
		//$id = intval($this->uri->rsegment(3));
		$css_custom = '1';
		$this->data['css_custom'] = $css_custom;
		
		$id = intval('164');
		$info = $this->catalog_model->get_info($id);

		if(!$info){
			redirect(base_url('404_override'));
		}

		if($info->status !== '0'){
			redirect(base_url('404_override'));
		}

		if($info->url_status !== '0'){
			redirect(base_url('404_override'));
		}
		//Phần lấy thông tin chung

		$this->data['info'] = $info;

		//Lấy ảnh social của $info
		$social_image_of_this_info = base_url('upload/catalog/'.$info->social_image_link);
		$this->data['social_image_of_this_info'] = $social_image_of_this_info;

		//Cập nhật lượt views
		$views = $info->views;
		$data = array(
			'views' => $views + 1,
		);
		$this->catalog_model->update($info->id,$data);

		//Kiểm tra xem đây là danh mục tin tức hay danh mục Video
		if($info->catalog_type == '0'){//Nếu là danh mục tin tức
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '10'; // Số lượng sản phẩm hiển thị trên từng trang.
				$config['uri_segment'] = '4'; // phân đoạn hiển thị ra số trang trên url.
				$config['pre_link']      	= '««';
				$config['next_link']     	= '»';
				$config['first_link']    	= '««';
				$config['last_link']     	= '»»';
				$config['cur_tag_open']  	=  '<span aria-current="page" class="page-numbers current">';
				$config['cur_tag_close'] 	=  '</span>';
				$config['num_tag_open']		= '<span class="page-numbers">' ;
				$config['num_tag_close']	= '</span>';
				$config['prev_tag_open']	= '<span class="prev page-numbers">';
				$config['prev_tag_close']	= '</span>';
				$config['next_tag_open']	= '<span class="next page-numbers">';
				$config['next_tag_close']	= '</span>';
				$config['first_tag_open']	= '<span class="page-numbers">';
				$config['first_tag_close']	= '</span>';
				$config['last_tag_open']	= '<span class="page-numbers">';
				$config['last_tag_close']	= '</span>';

				//Khởi tạo cấu hình phân trang
				$this->pagination->initialize($config);

				$segment = $this->uri->segment(4);
				$segment = intval($segment);

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;


			//Lấy danh mục - dịch vụ liên quan
				//Kiểm tra xem có danh mục nào nằm dưới $info hay không
				$input_child_catalog = array();
				$input_child_catalog['where'] = array('parent_id' => $info->id);
				$child_catalog_list = $this->catalog_model->get_list($input_child_catalog);
				if(!empty($child_catalog_list)){ //Nếu có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->id);
					$input_relate_list['order'] = array('sort_order','asc');
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}else{ //Nếu không có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->parent_id);
					$input_relate_list['order'] = array('sort_order','asc');
					$this->db->where('id !=',$info->id);
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}
			
			//Lấy bài viết liên quan tới danh mục
				$input_relate_news = array(); // Tạo biến danh sách bài viết liên quan tổng

				//Kiểm tra có bài viết thuộc danh mục này không -- Nếu có thì lấy trước & cho hiển thị trước -- Gộp vào $input_relate_news
				$input_most_views_child_news = array();
				$input_most_views_child_news['where'] = array('catalog_id' => $info->id, 'status' => '0', 'catalog_status' => '0');
				$input_most_views_child_news['order'] = array('views','desc');
				$relate_most_views_list = $this->news_model->get_list($input_most_views_child_news);
				foreach($relate_most_views_list as $row){
					$input_relate_news[] = $row->id; //Gộp danh sách id bài viết con của $info vào $input_relate_news
				}
				
				//Tiếp tục lấy bài viết xem nhiều của các danh mục liên quan -- Gộp vào $input_relate_news
				foreach($relate_list as $row){
					$input_relate_news_of_row = array();
					$input_relate_news_of_row['where'] = array('catalog_id' => $row->id, 'status' => '0', 'catalog_status' => '0');
					$relate_news_of_row = $this->news_model->get_list($input_relate_news_of_row);
					foreach($relate_news_of_row as $news_1){
						$input_relate_news[] = $news_1->id; //Gộp danh sách id bài viết con của $row vào $input_relate_news
					}
					//Kiểm tra xem các danh mục liên quan có danh mục cha hay không 
					$input_child_catalog_of_row = array();
					$input_child_catalog_of_row['where'] = array('parent_id' => $row->id);
					$child_catalog_list_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
					foreach($child_catalog_list_of_row as $subs){
						$input_relate_news_of_subs = array();
						$input_relate_news_of_subs['where'] = array('catalog_id' => $subs->id, 'status' => '0', 'catalog_status' => '0');
						$relate_news_of_subs = $this->news_model->get_list($input_relate_news_of_subs);
						foreach($relate_news_of_subs as $news_2){
							$input_relate_news[] = $news_2->id; //Gộp danh sách id bài viết con của $subs vào $input_relate_news
						}
					}
				}
				$this->db->order_by('views','desc');
				$most_views_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - xem nhiều
				$this->data['most_views_news_relate'] = $most_views_news_relate;

				$this->db->order_by('id','desc');
				$new_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - mới nhất
				$this->data['new_news_relate'] = $new_news_relate;
			

			//Lấy banner liên quan hoặc được gán vào danh mục -- theo phương thức random
				$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
				//Lấy danh sách các banner được gán vào tất cả danh mục
				$input_banner_for_all_catalog = array();
				$input_banner_for_all_catalog['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => '0');
				$banner_for_all_catalog = $this->slider_model->get_list($input_banner_for_all_catalog);
				foreach($banner_for_all_catalog as $row){
					if(isset($row->id)){
						$id_of_banner_list[] = $row->id; //Gộp $row->id vào $id_of_banner_list
					}
				}
				//Lấy danh sách banner được gán vào $info
				$input_banner_list_of_info = array();
				$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $info->id);
				$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
				foreach($banner_list_of_info as $row){
					$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
				}
				
				//Lấy danh sách banner được gán vào danh mục cha của $info (nếu $info Nếu $info có danh mục cha)
				if($info->parent_id !== '0'){
					$parent_of_info = $this->catalog_model->get_info($info->parent_id);
					if(isset($parent_of_info->id)){ //Nếu $info có danh mục cha

						$input_banner_list_parent_of_info = array();
						$input_banner_list_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_info->id);
						$banner_list_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_info);
						foreach($banner_list_parent_of_info as $row){
							$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
						}

						//Lấy danh sách banner được gán vào danh mục cha của danh mục cha của $info (nếu $info Nếu $parent_of_info có danh mục cha)
						$parent_of_parent_of_info = $this->catalog_model->get_info($parent_of_info->parent_id);
						if(isset($parent_of_parent_of_info->id)){ //Nếu tồn tại $parent_of_parent_of_info
							$input_banner_list_parent_of_parent_of_info = array();
							$input_banner_list_parent_of_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_parent_of_info->id);
							$banner_list_parent_of_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_parent_of_info);
							foreach($banner_list_parent_of_parent_of_info as $row){
								$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
							}
						}
					}
				}
				
				if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
					$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
					$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
					$this->data['banner_of_this_info'] = $banner_of_this_info;
				}

			//Phần chọn layout để truyền ra view
			if($info->content_status == '0'){
				if($info->layout_type == '0'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_tin_tuc';
				}
				if($info->layout_type == '1'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_bac_si';
				}
				if($info->layout_type == '2'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_dich_vu';
				}
				if($info->layout_type == '999'){
					redirect($info->landingpage_url);
				}
				
			}else{
				$this->data['temp'] = 'site/desktop/blog/catalog_layout_bai_viet';
			}
		}else{//Nếu là danh mục video
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_video_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '12'; // Số lượng sản phẩm hiển thị trên từng trang.
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

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_video_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;

			$this->data['temp'] = 'site/desktop/blog/catalog_video';
		}
		

		//Lưu cache 180 phút - 3 giờ 
		//$this->output->cache('180');

		$this->load->view('site/desktop/layout', $this->data);
	}

	function gallery_rang_su_desktop(){
		//Lấy ID của danh mục sản phẩm
		//$id = intval($this->uri->rsegment(3));
		$css_custom = '1';
		$this->data['css_custom'] = $css_custom;

		$id = intval('165');
		$info = $this->catalog_model->get_info($id);

		if(!$info){
			redirect(base_url('404_override'));
		}

		if($info->status !== '0'){
			redirect(base_url('404_override'));
		}

		if($info->url_status !== '0'){
			redirect(base_url('404_override'));
		}
		//Phần lấy thông tin chung

		$this->data['info'] = $info;

		//Lấy ảnh social của $info
		$social_image_of_this_info = base_url('upload/catalog/'.$info->social_image_link);
		$this->data['social_image_of_this_info'] = $social_image_of_this_info;

		//Cập nhật lượt views
		$views = $info->views;
		$data = array(
			'views' => $views + 1,
		);
		$this->catalog_model->update($info->id,$data);

		//Kiểm tra xem đây là danh mục tin tức hay danh mục Video
		if($info->catalog_type == '0'){//Nếu là danh mục tin tức
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '10'; // Số lượng sản phẩm hiển thị trên từng trang.
				$config['uri_segment'] = '4'; // phân đoạn hiển thị ra số trang trên url.
				$config['pre_link']      	= '««';
				$config['next_link']     	= '»';
				$config['first_link']    	= '««';
				$config['last_link']     	= '»»';
				$config['cur_tag_open']  	=  '<span aria-current="page" class="page-numbers current">';
				$config['cur_tag_close'] 	=  '</span>';
				$config['num_tag_open']		= '<span class="page-numbers">' ;
				$config['num_tag_close']	= '</span>';
				$config['prev_tag_open']	= '<span class="prev page-numbers">';
				$config['prev_tag_close']	= '</span>';
				$config['next_tag_open']	= '<span class="next page-numbers">';
				$config['next_tag_close']	= '</span>';
				$config['first_tag_open']	= '<span class="page-numbers">';
				$config['first_tag_close']	= '</span>';
				$config['last_tag_open']	= '<span class="page-numbers">';
				$config['last_tag_close']	= '</span>';

				//Khởi tạo cấu hình phân trang
				$this->pagination->initialize($config);

				$segment = $this->uri->segment(4);
				$segment = intval($segment);

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;


			//Lấy danh mục - dịch vụ liên quan
				//Kiểm tra xem có danh mục nào nằm dưới $info hay không
				$input_child_catalog = array();
				$input_child_catalog['where'] = array('parent_id' => $info->id);
				$child_catalog_list = $this->catalog_model->get_list($input_child_catalog);
				if(!empty($child_catalog_list)){ //Nếu có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->id);
					$input_relate_list['order'] = array('sort_order','asc');
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}else{ //Nếu không có
					$input_relate_list = array();
					$input_relate_list['where'] = array('status' => '0', 'url_status' => '0', 'parent_id' => $info->parent_id);
					$input_relate_list['order'] = array('sort_order','asc');
					$this->db->where('id !=',$info->id);
					$relate_list = $this->catalog_model->get_list($input_relate_list);
					$this->data['relate_list'] = $relate_list;
				}
			
			//Lấy bài viết liên quan tới danh mục
				$input_relate_news = array(); // Tạo biến danh sách bài viết liên quan tổng

				//Kiểm tra có bài viết thuộc danh mục này không -- Nếu có thì lấy trước & cho hiển thị trước -- Gộp vào $input_relate_news
				$input_most_views_child_news = array();
				$input_most_views_child_news['where'] = array('catalog_id' => $info->id, 'status' => '0', 'catalog_status' => '0');
				$input_most_views_child_news['order'] = array('views','desc');
				$relate_most_views_list = $this->news_model->get_list($input_most_views_child_news);
				foreach($relate_most_views_list as $row){
					$input_relate_news[] = $row->id; //Gộp danh sách id bài viết con của $info vào $input_relate_news
				}
				
				//Tiếp tục lấy bài viết xem nhiều của các danh mục liên quan -- Gộp vào $input_relate_news
				foreach($relate_list as $row){
					$input_relate_news_of_row = array();
					$input_relate_news_of_row['where'] = array('catalog_id' => $row->id, 'status' => '0', 'catalog_status' => '0');
					$relate_news_of_row = $this->news_model->get_list($input_relate_news_of_row);
					foreach($relate_news_of_row as $news_1){
						$input_relate_news[] = $news_1->id; //Gộp danh sách id bài viết con của $row vào $input_relate_news
					}
					//Kiểm tra xem các danh mục liên quan có danh mục cha hay không 
					$input_child_catalog_of_row = array();
					$input_child_catalog_of_row['where'] = array('parent_id' => $row->id);
					$child_catalog_list_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
					foreach($child_catalog_list_of_row as $subs){
						$input_relate_news_of_subs = array();
						$input_relate_news_of_subs['where'] = array('catalog_id' => $subs->id, 'status' => '0', 'catalog_status' => '0');
						$relate_news_of_subs = $this->news_model->get_list($input_relate_news_of_subs);
						foreach($relate_news_of_subs as $news_2){
							$input_relate_news[] = $news_2->id; //Gộp danh sách id bài viết con của $subs vào $input_relate_news
						}
					}
				}
				$this->db->order_by('views','desc');
				$most_views_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - xem nhiều
				$this->data['most_views_news_relate'] = $most_views_news_relate;

				$this->db->order_by('id','desc');
				$new_news_relate = $this->news_model->get_list($input_relate_news); //Lấy danh sách bài viết liên quan - mới nhất
				$this->data['new_news_relate'] = $new_news_relate;
			

			//Lấy banner liên quan hoặc được gán vào danh mục -- theo phương thức random
				$id_of_banner_list = array(); //Tạo $id_of_banner_list là biến tổng danh sách id của các banner được gán vào $info
				//Lấy danh sách các banner được gán vào tất cả danh mục
				$input_banner_for_all_catalog = array();
				$input_banner_for_all_catalog['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => '0');
				$banner_for_all_catalog = $this->slider_model->get_list($input_banner_for_all_catalog);
				foreach($banner_for_all_catalog as $row){
					if(isset($row->id)){
						$id_of_banner_list[] = $row->id; //Gộp $row->id vào $id_of_banner_list
					}
				}
				//Lấy danh sách banner được gán vào $info
				$input_banner_list_of_info = array();
				$input_banner_list_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $info->id);
				$banner_list_of_info = $this->slider_model->get_list($input_banner_list_of_info);
				foreach($banner_list_of_info as $row){
					$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
				}
				
				//Lấy danh sách banner được gán vào danh mục cha của $info (nếu $info Nếu $info có danh mục cha)
				if($info->parent_id !== '0'){
					$parent_of_info = $this->catalog_model->get_info($info->parent_id);
					if(isset($parent_of_info->id)){ //Nếu $info có danh mục cha

						$input_banner_list_parent_of_info = array();
						$input_banner_list_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_info->id);
						$banner_list_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_info);
						foreach($banner_list_parent_of_info as $row){
							$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
						}

						//Lấy danh sách banner được gán vào danh mục cha của danh mục cha của $info (nếu $info Nếu $parent_of_info có danh mục cha)
						$parent_of_parent_of_info = $this->catalog_model->get_info($parent_of_info->parent_id);
						if(isset($parent_of_parent_of_info->id)){ //Nếu tồn tại $parent_of_parent_of_info
							$input_banner_list_parent_of_parent_of_info = array();
							$input_banner_list_parent_of_parent_of_info['where'] = array('status' => '0', 'type' => '1', 'catalog_id' => $parent_of_parent_of_info->id);
							$banner_list_parent_of_parent_of_info = $this->slider_model->get_list($input_banner_list_parent_of_parent_of_info);
							foreach($banner_list_parent_of_parent_of_info as $row){
								$id_of_banner_list[] = $row->id; // Gộp $row->id vào $id_of_banner_list
							}
						}
					}
				}
				
				if(!empty($id_of_banner_list)){ //Nếu danh sách id của banner là không rỗng -- nghĩa là có banner được chọn hoặc liên quan
					$id_of_shown_banner = $id_of_banner_list[array_rand($id_of_banner_list)]; //Lấy random 1 giá trị
					$banner_of_this_info = $this->slider_model->get_info($id_of_shown_banner);
					$this->data['banner_of_this_info'] = $banner_of_this_info;
				}

			//Phần chọn layout để truyền ra view
			if($info->content_status == '0'){
				if($info->layout_type == '0'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_tin_tuc';
				}
				if($info->layout_type == '1'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_bac_si';
				}
				if($info->layout_type == '2'){
					$this->data['temp'] = 'site/desktop/blog/catalog_layout_danh_muc_dich_vu';
				}
				if($info->layout_type == '999'){
					redirect($info->landingpage_url);
				}
				
			}else{
				$this->data['temp'] = 'site/desktop/blog/catalog_layout_bai_viet';
			}
		}else{//Nếu là danh mục video
			//Lấy danh sách bài viết thuộc danh mục
				$input_list = array();
				$input_list['where'] = array('status' => '0','catalog_video_status' => '0');
				$input_list['order'] = array('id','desc');

				$catalog_list_of_news = array(); // $catalog_list_of_news là biến tổng các catalog_id của danh sách bài viết cần lấy, chính là $list
				$catalog_list_of_news[] = $info->id; //Gộp $info->id vào $catalog_list_of_news
				
				//Kiểm tra xem $info có danh mục con hay không
				$input_child_catalog_of_info = array();
				$input_child_catalog_of_info['where'] = array('status' => '0','parent_id' => $info->id);
				$child_catalog_list_of_info = $this->catalog_model->get_list($input_child_catalog_of_info);
				foreach($child_catalog_list_of_info as $row){
					if(isset($row->id)){
						$catalog_list_of_news[] = $row->id; //Gộp $row->id vào $catalog_list_of_news
						$input_child_catalog_of_row = array();
						$input_child_catalog_of_row['where'] = array('status' => '0','parent_id' => $row->id);
						$child_catalog_of_row = $this->catalog_model->get_list($input_child_catalog_of_row);
						foreach($child_catalog_of_row as $subs){
							if(isset($subs->id)){
								$catalog_list_of_news[] = $subs->id;
							}
						}
					}
					
				}

				//Lấy ra danh sách sản bài viết danh mục đó
				//lấy ra tổng số lượng tất cả các sản phẩm trong website 
				$total_rows = $this->news_model->get_total($input_list);
				$this->data['total_rows'] = $total_rows;

				//load ra thư viện phân trang
				$this->load->library('pagination');
				$config =  array();
				$config['total_rows']  = $total_rows; //tổng tất cả các sản phẩm trên website.
				$config['base_url']    = base_url('blog/catalog_desktop/'.$id);// link hiển thị ra dữ liệu danh sách sản phẩm.
				$config['per_page']    = '12'; // Số lượng sản phẩm hiển thị trên từng trang.
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

				
				$input_list['limit'] = array($config['per_page'], $segment);
				

				$this->db->where_in('catalog_video_id', $catalog_list_of_news);

				$list = $this->news_model->get_list($input_list);
				$this->data['list'] = $list;

			$this->data['temp'] = 'site/desktop/blog/catalog_video';
		}
		
		//Lưu cache 180 phút - 3 giờ 
		//$this->output->cache('180');
		
		$this->load->view('site/desktop/layout', $this->data);
	}

	




}