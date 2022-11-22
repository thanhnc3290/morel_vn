<div class="app-content content">
    <div class="content-wrapper">
      <?php $this->load->view('admin/contact/header'); ?>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="row match-height">
		            <div class="col-md-12">
		              <div class="card">
		                <div class="card-header">
		                  <h4 class="card-title" id="basic-layout-form-center">Cập nhật Thông Tin Liên Hệ</h4>
		                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
		                  <div class="heading-elements">
		                    <ul class="list-inline mb-0">
		                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
		                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
		                    </ul>
		                  </div>
		                </div>
		                <div class="card-content collapse show">
		                  <div class="card-body">
		                    
		                    <form class="form" method="post" action="#">
		                      <div class="row justify-content-md-center">
		                        <div class="col-md-6">
		                          <div class="form-body">
								  	<div class="form-group">
		                              <label >Dạng:</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="film_name" value="<?php if($info->type == '1') echo 'đăng ký subcribes' ?><?php if($info->type == '0') echo 'Đăng ký nhận tư vấn' ?>" disabled>
									</div>
									<?php if($info->type == '0'): ?>
									<div class="form-group">
		                              <label >Tác phẩm:</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="film_name" value="<?php echo $info->title ?>" disabled>
									</div>
									<?php endif; ?>
		                            <div class="form-group">
		                              <label >Họ & Tên:</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="film_name" value="<?php echo $info->name ?>" disabled>
		                            </div>
		                            <div class="form-group">
		                              <label >Số điện thoại:</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="film_name" value="<?php echo $info->phone ?>" disabled>
		                            </div>
		                            <div class="form-group">
		                              <label >Email:</label>
		                              <input type="text"  class="form-control" placeholder="Không có E-mail" name="film_name" value="<?php echo $info->email ?>" disabled>
		                            </div>
		                            <div class="form-group">
		                              <label >Ngày Tạo:</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="" value="<?php echo get_date($info->created) ?>" disabled>
		                            </div>

		                            <div class="form-group">
		                              <label >Nội Dung:</label>
		                              <textarea type="text"  class="form-control" placeholder="Nhập user name" name="" disabled=""><?php echo $info->content ?></textarea>
		                            </div>
		                           

		                            <div class="row">
			                          	<div class="col-md-12">
				                          	<div class="form-group">
				                              	<label for="projectinput5">Trạng Thái</label>
				                              	<select id="projectinput5" name="status" class="form-control">
					                                <option value="0"<?php if($info->status == 0) echo 'selected' ?>>Chưa Xử Lý</option>
					                                <option value="1"<?php if($info->status == 1) echo 'selected' ?>>Đã Xử Lý</option>
					                            </select>
				                            </div>
				                        </div>

			                        	
			                        </div>

		                         
		                          </div>
		                        </div>
		                      </div>
		                      <div class="form-actions center">
		                      
		                        <button type="submit" class="btn btn-primary">
		                          <i class="fa fa-check-square-o"></i> Cập nhật
		                        </button>

		                      </div>
		                    </form>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
                
              </div>
            </div>
          </div>
        </section>
        
      </div>
    </div>
  </div>