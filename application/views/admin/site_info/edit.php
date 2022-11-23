<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			<h3 class="content-header-title mb-0">Quản lý Thông tin Website</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
					<a href="" data-toggle="modal" data-target="#edit_robot_txt" style="margin-right: 10px;">
						<div class="btn-group" role="group">
							<button class="btn btn-outline-primary" type="button"><i class="ft-plus-square icon-left"></i> Chỉnh sửa Robots.txt</button>
						</div>
					</a>
					<!-- <a href="" data-toggle="modal" data-target="#edit_popup" style="margin-right: 10px;">
						<div class="btn-group" role="group">
							<button class="btn btn-outline-primary" type="button"><i class="ft-plus-square icon-left"></i> Chỉnh sửa Popup</button>
						</div>
					</a> -->
					<!-- <a href="" data-toggle="modal" data-target="#edit_message_total_site" style="margin-right: 10px;">
						<div class="btn-group" role="group">
							<button class="btn btn-outline-primary" type="button"><i class="ft-plus-square icon-left"></i> Chỉnh sửa Thông báo toàn website</button>
						</div>
					</a> -->
				</div>
			</div>
		</div>
      <div class="content-body">

<!-- Zero configuration table --> 
    <section id="configuration">
<!-- Thông báo -->
			<?php if(isset($message) && $message):?>
          <div class="row" id="admin_message">
            <div class="col-md-12">
              <div class="card p-1 text-white bg-teal">
                <div class="card-content">
                  <div class="card-body" style="padding: 0px;">
                    <div class="float-left">
                      <p class="white mb-0" style="text-align: center;">
                        <strong><?php echo $message; ?></strong>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <style>
            #admin_message {
                -webkit-animation: cssAnimation 7s forwards; 
                animation: cssAnimation 7s forwards;
            }
            @keyframes cssAnimation {
                0%   {opacity: 1;height: 1;}
                90%  {opacity: 1;height: 0.8;}
                100% {opacity: 0;height: 0;}
            }
            @-webkit-keyframes cssAnimation {
                0%   {opacity: 1;height: 1;}
                90%  {opacity: 1;height: 0.8;}
                100% {opacity: 0;height: 0;}
            }
          </style>
        <?php endif; ?>
<!-- END Thông báo -->
          <div class="row">
			  
            <div class="col-12">
              <div class="card">
                <div class="row match-height">
		            <div class="col-md-12">
		              <div class="card">
		                <div class="card-header">
		                  <h4 class="card-title" id="basic-layout-form-center">Chỉnh Sửa Thông Tin Website</h4>
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
		                    
			                    <form class="form" action="" method="post" enctype="multipart/form-data">
			                      	<div class="row justify-content-md-left">
			                      		<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Basic Information:</b></u></h4>
						                </div>
				                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Site Title:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tên Website" name="site_title" value="<?php echo $info->site_title ?>">
					                        </fieldset> 
					                    </div>
					                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Email:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập E-mail liên hệ" name="email" value="<?php echo $info->email ?>">
					                        </fieldset> 
					                    </div>
					                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Địa chỉ:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập địa chỉ" name="address" value="<?php echo $info->address ?>">
					                        </fieldset> 
										</div>
										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Số điện thoại:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập Số điện thoại liên hệ" name="phone" value="<?php echo $info->phone ?>">
					                        </fieldset> 
										</div>
										<!-- <div class="col-xl-3 col-lg-3 col-md-3 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Số hotline:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập Số điện thoại liên hệ" name="hotline" value="<?php echo $info->hotline ?>">
					                        </fieldset> 
					                    </div> -->
					                    <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Fanpage:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn Fanpage chính" name="facebook" value="<?php echo $info->facebook ?>">
					                        </fieldset> 
										</div>
										<!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Instagram:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn Instagram chính" name="insta" value="<?php echo $info->insta ?>">
					                        </fieldset> 
										</div> -->
										<div class="col-xl-4 col-lg-4 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Zalo:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn Zalo chính" name="zalo" value="<?php echo $info->zalo ?>">
					                        </fieldset> 
					                    </div>
					                    <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Youtube:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn Youtube Channel chính" name="youtube" value="<?php echo $info->youtube ?>">
					                        </fieldset> 
					                    </div>

					                    <div class="col-xl-12 col-lg-12 col-md-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Đường dẫn Google Map:</label>
					                          <textarea name="google_map" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập đường dẫn"><?php echo $info->google_map ?></textarea>
					                        </fieldset>
					                     </div>
					                    
									</div>

									
					                <div class="row justify-content-md-left">
						            	<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>SEO Onpage:</b></u></h4>
						                </div>   
						               
					                     <div class="col-xl-12 col-lg-12 col-md-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Mô tả website (Meta Descreption):</label>
					                          <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập mô tả website"><?php echo $info->meta_desc ?></textarea>
					                        </fieldset>
					                     </div>

					                     <div class="col-xl-12 col-lg-12 col-md-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
					                          <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập từ khóa website"><?php echo $info->meta_key ?></textarea>
					                        </fieldset>
					                     </div>
					                </div>

					                

						            <div class="row justify-content-md-left">
										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<h4><u><b>Ảnh Share Social (kích thước chuẩn 1080x608 px):</b></u></h4>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12">
												<fieldset class="form-group">
													<input name="social_image_link" type="file" id="file_social_image_link">
												</fieldset>
												<?php
													$social_image_link_of_this_info = '';
													if($info->social_image_link !== ''){
														$social_image_link_of_this_info = base_url('upload/site_info/'.$info->social_image_link);
													}
												?>
												<!-- Thẻ hiển thị Preview ảnh -->
												<fieldset class="form-group">
													<center><img id="image_of_social_image_link" style="max-height:300px;max-width:100%;" src="<?php echo $social_image_link_of_this_info ?>" /></center>
													<script>
														document.getElementById("file_social_image_link").onchange = function () {
															var reader = new FileReader();
															reader.onload = function (e) {
																// get loaded data and render thumbnail.
																document.getElementById("image_of_social_image_link").src = e.target.result;
															};
															// read the image file as a data URL.
															reader.readAsDataURL(this.files[0]);
														};
													</script>
												</fieldset>
												<!-- END thẻ hiển thị view ảnh -->
											</div>
										</div>

										
										
									</div>

									

								

					                <div class="row justify-content-md-left">
						            	<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Code theo dõi (analytics, facebook pixel,...):</b></u></h4>
						                </div>
						                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Code gắn toàn trang:</label>
					                          <textarea name="scripts_total_site" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập Code"><?php echo $info->scripts_total_site ?></textarea>
					                        </fieldset>
										</div>
										
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Code xác nhận gắn sau thẻ body (nếu có):</label>
					                          <textarea name="script_verified_site_in_body" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập Code"><?php echo $info->script_verified_site_in_body ?></textarea>
					                        </fieldset>
					                    </div>

					                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					                        <fieldset class="form-group">
					                          <label for="basicTextarea">Code đặt tại trang đo chuyển đổi (trang thank you):</label>
					                          <textarea name="scripts_conversation" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập Code"><?php echo $info->scripts_conversation ?></textarea>
					                        </fieldset>
					                    </div>
									</div>
									
									<div class="form-actions center">
				                      	<button type="submit" class="btn btn-primary">
				                          <i class="fa fa-check-square-o"></i> UPDATE
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


<!---------------------------------------------------------------------------------------------------------------------------------- Modal edit_message_total_site -->
	<div class="modal fade" id="edit_message_total_site" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa Slider Tin tức</b></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<!-- form edit total link -->
			<form class="form" action="<?php echo admin_url('site_info/edit_message_total_site') ?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="card-body">
				<div class="row justify-content-md-left" id="content">
					<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					<h4><u><b>Nội dung Thông báo:</b></u></h4>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
					<fieldset class="form-group">
						<textarea name="message_total_site" id="editor" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px;"><?php echo $site_info->message_total_site ?></textarea>
						<script>
						CKEDITOR.replace('editor');
						</script>
					</fieldset>
					</div>
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button id="submit_button" type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
			</form>
			<!-- end form create -->
		</div>
		</div>
	</div>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit_message_total_site -->


<!---------------------------------------------------------------------------------------------------------------------------------- Modal edit_popup -->
	<div class="modal fade" id="edit_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa Popup</b></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<!-- form edit total link -->
			<form class="form" action="<?php echo admin_url('site_info/edit_popup') ?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="card-body">
				<div class="row justify-content-md-left" id="content">
					
					<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
						<fieldset class="form-group">
							<label for="basicInput">Tên Popup:</label>
							<input type="text" class="form-control" id="basicInput" placeholder="Nhập tên Popup" name="popup_name" value="<?php echo $info->popup_name ?>">
						</fieldset>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					<fieldset class="form-group">
						<label for="basicSelect">Trạng thái:</label>
						<select class="form-control" id="basicSelect" name="popup_status">
						<option value="0" <?php if($site_info->popup_status == '0') echo 'selected' ?>>ON</option>
						<option value="1" <?php if($site_info->popup_status == '1') echo 'selected' ?>>OFF</option>
						</select>
					</fieldset>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						<fieldset class="form-group">
							<label for="basicInput">Link:</label>
							<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn" name="popup_link" value="<?php echo $info->popup_link ?>">
						</fieldset>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
							<h4><u><b>Ảnh Popup (kích thước chuẩn 300x300 px):</b></u></h4>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<fieldset class="form-group">
								<input name="popup_image_link" type="file" id="file_popup_image_link">
							</fieldset>
							<?php
								$popup_image_link_of_this_info = '';
								if($info->popup_image_link !== ''){
									$popup_image_link_of_this_info = base_url('upload/site_info/'.$info->popup_image_link);
								}
							?>
							<!-- Thẻ hiển thị Preview ảnh -->
							<fieldset class="form-group">
								<center><img id="image_of_popup_image_link" style="max-height:300px;max-width:100%;" src="<?php echo $popup_image_link_of_this_info ?>" /></center>
								<script>
									document.getElementById("file_popup_image_link").onchange = function () {
										var reader = new FileReader();
										reader.onload = function (e) {
											// get loaded data and render thumbnail.
											document.getElementById("image_of_popup_image_link").src = e.target.result;
										};
										// read the image file as a data URL.
										reader.readAsDataURL(this.files[0]);
									};
								</script>
							</fieldset>
							<!-- END thẻ hiển thị view ảnh -->
						</div>
					</div>

				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button id="submit_button" type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
			</form>
			<!-- end form create -->
		</div>
		</div>
	</div>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit_popup -->

<!---------------------------------------------------------------------------------------------------------------------------------- Modal edit_robot_txt -->
	<div class="modal fade" id="edit_robot_txt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa Nội dung Robots.txt</b></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<!-- form edit total link -->
			<form class="form" action="<?php echo admin_url('site_info/edit_robot_txt') ?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="card-body">
				<div class="row justify-content-md-left" id="content">
					<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					<h4><u><b>Nội dung File:</b></u></h4>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
					<fieldset class="form-group">
						<textarea name="robot_txt" class="form-control" rows="9" style="margin-top: 0px; margin-bottom: 0px; height: 450px;"><?php echo $site_info->robot_txt ?></textarea>
						
					</fieldset>
					</div>
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button id="submit_button" type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
			</form>
			<!-- end form create -->
		</div>
		</div>
	</div>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit_robot_txt -->

