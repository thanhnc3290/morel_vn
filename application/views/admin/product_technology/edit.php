<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			<h3 class="content-header-title mb-0">Chỉnh Sửa Công Nghệ Sản Phẩm</h3>
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
						                	<h4><u><b>Thông Tin Cơ Bản:</b></u></h4>
						                </div>
				                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên:</label>
                                                <input id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên công nghệ" value="<?php echo $info->name ?>" required>
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Trạng thái:</label>
                                                <select class="form-control" id="basicSelect" name="status">
                                                <option value="0" <?php if($info->status == '0'){echo 'selected';} ?>>ON</option>
                                                <option value="1" <?php if($info->status == '1'){echo 'selected';} ?>>OFF</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-left">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                <h4><u><b>Hình ảnh (kích thước 400x250px):</b></u></h4>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <fieldset class="form-group">
                                                    <input name="image_link" type="file" id="files">
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <?php 
                                                    $image_link_of_this_info = public_url('site/images/no_image.jpg');
                                                    if($info->image_link !==''){
                                                        $image_link_of_this_info = base_url('upload/product_technology/'.$info->image_link);
                                                    }
                                                ?>
                                                <fieldset class="form-group">
                                                    <center><img id="image" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo $image_link_of_this_info ?>" /></center>
                                                    <script>
                                                        document.getElementById("files").onchange = function () {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            // get loaded data and render thumbnail.
                                                            document.getElementById("image").src = e.target.result;
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

                                    <div class="row justify-content-md-left" id="content">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <h4><u><b>Nội dung:</b></u></h4>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <textarea name="content" id="editor_0" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px; width:100%;"><?php echo $info->content ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('editor_0');
                                                </script>
                                            </fieldset>
                                        </div>
                                    </div>

									<div class="form-actions center">
				                      	<button type="submit" class="btn btn-primary">
				                          <i class="fa fa-check-square-o"></i> Create
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
