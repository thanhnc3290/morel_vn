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
		                  <h4 class="card-title" id="basic-layout-form-center">Tạo mới tài khoản Admin</h4>
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
		                    
		                    <form class="form" method="post" action="">
		                      <div class="row justify-content-md-center">
		                        <div class="col-md-6">
		                          <div class="form-body">
		                            <div class="form-group">
		                              <label >User Name</label>
		                              <input type="text"  class="form-control" placeholder="Nhập user name" name="username">
		                            </div>
		                            <div class="form-group">
		                              <label >Mật Khẩu</label>
		                              <input type="password"  class="form-control" placeholder="Nhập mật khẩu" name="password">
		                            </div>
		                            <div class="form-group">
		                              <label >Nhập Lại Mật Khẩu</label>
		                              <input type="password"  class="form-control" placeholder="Nhập lại mật khẩu" name="re_password">
		                            </div>

		                            <div class="row">
			                          	<div class="col-md-6">
				                          	<div class="form-group">
				                              	<label for="projectinput5">Trạng Thái</label>
				                              	<select id="projectinput5" name="status" class="form-control">
					                            	<option value="" selected="" disabled="">--Chọn 1 trạng thái--</option>
					                                <option value="0">ON</option>
					                                <option value="1">OFF</option>
					                            </select>
				                            </div>
				                        </div>

			                        	<div class="col-md-6">
			                            	<div class="form-group">
			                              		<label for="projectinput6">Phân Quyền</label>
			                              		<select id="projectinput6" name="group_id" class="form-control">
			                                		<option value="" selected="" disabled="">--Chọn 1 quyền--</option>
			                                		<option value="1">Admin</option>
			                                		<option value="2">Editor</option>
			                              		</select>
			                           		</div>
			                          	</div>
			                        </div>

		                         
		                          </div>
		                        </div>
		                      </div>
		                      <div class="form-actions center">
		                      
		                        <button type="submit" class="btn btn-primary">
		                          <i class="fa fa-check-square-o"></i> Thêm mới
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