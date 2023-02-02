<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			<h3 class="content-header-title mb-0">Chỉnh sửa trang chủ</h3>
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
						                	<h4><u><b>Video:</b></u></h4>
						                </div>
				                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Video Title:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tên Video" name="video_title" value="<?php echo $info->video_title ?>">
					                        </fieldset> 
					                    </div>
										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Video Url (link youtube):</label>
												<?php $video_url = '';if($info->video_id !== ''){$video_url = 'https://www.youtube.com/watch?v='.str_replace('https://www.youtube.com/watch?v=','',$info->video_id); } ?>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tên Video" name="video_id" value="<?php echo $video_url; ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Sản Phẩm Tiêu Biểu:</b></u></h4>
						                </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 1:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 1" name="relate_title_1" value="<?php echo $info->relate_title_1 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 2:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 2" name="relate_title_2" value="<?php echo $info->relate_title_2 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Các Sản Phẩm hiển thị:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 2" name="relate_product_list" value="<?php echo $info->relate_product_list ?>">
					                        </fieldset> 
					                    </div>
										
										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Banner sản phẩm 1:</b></u></h4>
						                </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Link đính kèm Banner:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn" name="relate_banner_link" value="<?php echo $info->relate_banner_link ?>">
					                        </fieldset> 
					                    </div>
										
										<div class="row justify-content-md-left">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<h4><u><b>Ảnh Banner (kích thước chuẩn 1920x700 px):</b></u></h4>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12">
													<fieldset class="form-group">
														<input name="relate_banner_image" type="file" id="relate_banner_image">
													</fieldset>
													<?php
														$relate_banner_image_of_this_info = '';
														if($info->relate_banner_image !== ''){
															$relate_banner_image_of_this_info = base_url('upload/site_info/'.$info->relate_banner_image);
														}
													?>
													<!-- Thẻ hiển thị Preview ảnh -->
													<fieldset class="form-group">
														<center><img id="image_of_relate_banner_image" style="max-height:300px;max-width:100%;" src="<?php echo $relate_banner_image_of_this_info ?>" /></center>
														<script>
															document.getElementById("relate_banner_image").onchange = function () {
																var reader = new FileReader();
																reader.onload = function (e) {
																	// get loaded data and render thumbnail.
																	document.getElementById("image_of_relate_banner_image").src = e.target.result;
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

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Banner sản phẩm 2:</b></u></h4>
						                </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Link đính kèm Banner:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn" name="relate_banner_link_2" value="<?php echo $info->relate_banner_link_2 ?>">
					                        </fieldset> 
					                    </div>

										<div class="row justify-content-md-left">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<h4><u><b>Ảnh Banner (kích thước chuẩn 1920x700 px):</b></u></h4>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12">
													<fieldset class="form-group">
														<input name="relate_banner_image_2" type="file" id="relate_banner_image_2">
													</fieldset>
													<?php
														$relate_banner_image_of_this_info_2 = '';
														if($info->relate_banner_image_2 !== ''){
															$relate_banner_image_of_this_info_2 = base_url('upload/site_info/'.$info->relate_banner_image_2);
														}
													?>
													<!-- Thẻ hiển thị Preview ảnh -->
													<fieldset class="form-group">
														<center><img id="image_of_relate_banner_image_2" style="max-height:300px;max-width:100%;" src="<?php echo $relate_banner_image_of_this_info_2 ?>" /></center>
														<script>
															document.getElementById("relate_banner_image_2").onchange = function () {
																var reader = new FileReader();
																reader.onload = function (e) {
																	// get loaded data and render thumbnail.
																	document.getElementById("image_of_relate_banner_image_2").src = e.target.result;
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

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Công Nghệ của Chúng Tôi:</b></u></h4>
						                </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 1:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 1" name="tech_title_1" value="<?php echo $info->tech_title_1 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Mô tả 1:</label>
					                        	<textarea type="text" class="form-control" id="basicInput" placeholder="Nhập mô tả 1" name="tech_desc_1"><?php echo $info->tech_desc_1 ?></textarea>
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 2:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 2" name="tech_title_2" value="<?php echo $info->tech_title_2 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Mô tả 2:</label>
					                        	<textarea type="text" class="form-control" id="basicInput" placeholder="Nhập mô tả 2" name="tech_desc_2"><?php echo $info->tech_desc_2 ?></textarea>
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 3:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 3" name="tech_title_3" value="<?php echo $info->tech_title_3 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Mô tả 3:</label>
					                        	<textarea type="text" class="form-control" id="basicInput" placeholder="Nhập mô tả 3" name="tech_desc_3"><?php echo $info->tech_desc_3 ?></textarea>
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Tiêu Đề 4:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập tiêu đề 4" name="tech_title_4" value="<?php echo $info->tech_title_4 ?>">
					                        </fieldset> 
					                    </div>

										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Mô tả 4:</label>
					                        	<textarea type="text" class="form-control" id="basicInput" placeholder="Nhập mô tả 4" name="tech_desc_4"><?php echo $info->tech_desc_4 ?></textarea>
					                        </fieldset> 
					                    </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Banner sản phẩm 3:</b></u></h4>
						                </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Link đính kèm Banner:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn" name="relate_banner_link_3" value="<?php echo $info->relate_banner_link_3 ?>">
					                        </fieldset> 
					                    </div>

										<div class="row justify-content-md-left">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<h4><u><b>Ảnh Banner (kích thước chuẩn 1920x700 px):</b></u></h4>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12">
													<fieldset class="form-group">
														<input name="relate_banner_image_3" type="file" id="relate_banner_image_3">
													</fieldset>
													<?php
														$relate_banner_image_of_this_info_3 = '';
														if($info->relate_banner_image_3 !== ''){
															$relate_banner_image_of_this_info_3 = base_url('upload/site_info/'.$info->relate_banner_image_3);
														}
													?>
													<!-- Thẻ hiển thị Preview ảnh -->
													<fieldset class="form-group">
														<center><img id="image_of_relate_banner_image_3" style="max-height:300px;max-width:100%;" src="<?php echo $relate_banner_image_of_this_info_3 ?>" /></center>
														<script>
															document.getElementById("relate_banner_image_3").onchange = function () {
																var reader = new FileReader();
																reader.onload = function (e) {
																	// get loaded data and render thumbnail.
																	document.getElementById("image_of_relate_banner_image_3").src = e.target.result;
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

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
						                	<h4><u><b>Banner sản phẩm 4:</b></u></h4>
						                </div>

										<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
					                        <fieldset class="form-group">
					                        	<label for="basicInput">Link đính kèm Banner:</label>
					                        	<input type="text" class="form-control" id="basicInput" placeholder="Nhập đường dẫn" name="relate_banner_link_4" value="<?php echo $info->relate_banner_link_4 ?>">
					                        </fieldset> 
					                    </div>

										<div class="row justify-content-md-left">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<h4><u><b>Ảnh Banner (kích thước chuẩn 1920x700 px):</b></u></h4>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12">
													<fieldset class="form-group">
														<input name="relate_banner_image_4" type="file" id="relate_banner_image_4">
													</fieldset>
													<?php
														$relate_banner_image_of_this_info_4 = '';
														if($info->relate_banner_image_4 !== ''){
															$relate_banner_image_of_this_info_4 = base_url('upload/site_info/'.$info->relate_banner_image_4);
														}
													?>
													<!-- Thẻ hiển thị Preview ảnh -->
													<fieldset class="form-group">
														<center><img id="image_of_relate_banner_image_4" style="max-height:300px;max-width:100%;" src="<?php echo $relate_banner_image_of_this_info_4 ?>" /></center>
														<script>
															document.getElementById("relate_banner_image_4").onchange = function () {
																var reader = new FileReader();
																reader.onload = function (e) {
																	// get loaded data and render thumbnail.
																	document.getElementById("image_of_relate_banner_image_4").src = e.target.result;
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



