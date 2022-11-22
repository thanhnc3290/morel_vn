<div class="app-content content">
    <div class="content-wrapper">
      <?php $this->load->view('admin/admin/header'); ?>
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
		                  <h4 class="card-title" id="basic-layout-form-center">Cập nhật tài khoản Admin</h4>
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
		                              <label >User Name</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="username" value="<?php echo $info->username ?>" disabled>
		                            </div>
		                            <div class="form-group">
		                              <label >Mật Khẩu</label>
		                              <input type="password"  class="form-control" placeholder="Nhập mật khẩu" name="password">
		                            </div>
		                            <div class="form-group">
		                              <label >Nhập Lại Mật Khẩu</label>
		                              <input type="password"  class="form-control" placeholder="Nhập lại mật khẩu" name="re_password">
		                            </div>

		                            <?php if($admin_position < '2'): //Nghĩa là quyền Admin hoặc Chief ?>
		                            <div class="row">
			                          	<div class="col-md-6">
				                          	<div class="form-group">
				                              	<label for="projectinput5">Trạng Thái</label>
				                              	<select id="projectinput5" name="status" class="form-control">
					                                <option value="0"<?php if($info->status == 0) echo 'selected' ?>>ON</option>
					                                <option value="1"<?php if($info->status == 1) echo 'selected' ?>>OFF</option>
					                            </select>
				                            </div>
				                        </div>

			                        	<div class="col-md-6">
			                            	<div class="form-group">
			                              		<label for="projectinput6">Phân Quyền</label>
			                              		<select id="projectinput6" name="group_id" class="form-control">
			                                		<option value="1" <?php if($info->group_id == 1) echo 'selected' ?>>Admin</option>
			                                		<option value="2" <?php if($info->group_id == 2) echo 'selected' ?>>Editor</option>
			                              		</select>
			                           		</div>
			                          	</div>
			                        </div>
			                    	<?php endif; ?>
		                         
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