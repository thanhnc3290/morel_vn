<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			<h3 class="content-header-title mb-0">Chỉnh Sửa Sản Phẩm</h3>
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
				                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên:</label>
                                                <input type="text" name="id" value="<?php echo $info->id ?>" style="display: none;">
                                                <input onchange="create_alias_<?php echo $info->id ?>()" id="input_name_<?php echo $info->id ?>" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo $info->name ?>">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Alias (tên đường dẫn):</label>
                                                <input style="" oninput="create_alias_<?php echo $info->id ?>()" id="alias_<?php echo $info->id ?>" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu" value="<?php echo $info->alias ?>">
                                                <label id="allert_error_<?php echo $info->id ?>" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Danh mục Sản Phẩm:</label>
                                                <select class="form-control" id="basicSelect" name="catalog_id" required>
                                                <option value=""> --- Lựa chọn danh mục --- </option>
                                                <?php foreach($catalog_list as $row): ?>
                                                    <option value="<?php echo $row->id ?>" <?php if($row->id == $info->catalog_id): ?><?php echo 'selected'; ?><?php else: ?><?php if(count($row->subs) > '0') {echo 'disabled';} ?> <?php if($row->status !== '0') { echo 'disabled';}?><?php endif; ?>><strong><?php echo $row->name ?></strong></option>
                                                    <?php foreach($row->subs as $subs): ?>
                                                    <option value="<?php echo $subs->id ?>" <?php if($subs->id == $info->catalog_id): ?><?php echo 'selected'; ?><?php else: ?><?php if($subs->status !== '0') { echo 'disabled';}else{if($subs->redirect_link !== ''){echo 'disabled';}}?><?php endif; ?>>-- <i><?php echo $subs->name ?></i></option>
                                                    <?php foreach($subs->subss as $subss): ?>
                                                        <option value="<?php echo $subss->id ?>" <?php if($subss->id == $info->catalog_id): ?><?php echo 'selected'; ?><?php else: ?><?php if($subss->status !== '0') { echo 'disabled';}else{if($subss->redirect_link  !== ''){echo 'disabled';}}?><?php endif; ?>><i>--  -- <?php echo $subss->name ?></i></option>
                                                    <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Trạng thái:</label>
                                                <select class="form-control" id="basicSelect" name="status">
                                                <option value="0" <?php if($info->status == '0'){echo 'selected';} ?>>ON</option>
                                                <option value="1" <?php if($info->status == '1'){echo 'selected';} ?>>OFF</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Thứ tự ưu tiên:</label>
                                                <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $info->sort_order; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 1:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_1" placeholder="Nhập tên Option 1" value="<?php echo $info->option_name_1 ?>">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 1 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_1" placeholder="Nhập giá Option 1" value="<?php echo $info->option_price_1 ?>">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 2:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_2" placeholder="Nhập tên Option 2" value="<?php echo $info->option_name_2 ?>">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 2 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_2" placeholder="Nhập giá Option 2" value="<?php echo $info->option_price_2 ?>">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 3:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_3" placeholder="Nhập tên Option 3" value="<?php echo $info->option_name_3 ?>">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 3 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_3" placeholder="Nhập giá Option 3" value="<?php echo $info->option_price_3 ?>">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 4:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_4" placeholder="Nhập tên Option 4" value="<?php echo $info->option_name_4 ?>">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 4 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_4" placeholder="Nhập giá Option 4" value="<?php echo $info->option_price_4 ?>">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
							                <fieldset class="form-group">
							                	<label for="basicSelect">Công Nghệ Trong Sản Phẩm (<a href="<?php echo admin_url('product_technology') ?>" target="_blank"><strong>Tạo mới</strong></a>):</label>
												
						                          <select class="select2 form-control" id="basicSelect" name="technology_id[]" multiple>
                                                    <?php 
                                                        $technology_list_of_this_info = json_decode($info->technology_id);
                                                    ?>
						                          	<option>Select</option>
						                            <?php foreach($technology_list as $cat): ?>
						                            <option value="<?php echo $cat->id ?>" <?php if($cat->status > '0'){echo 'disabled';} ?> <?php if(is_array($technology_list_of_this_info)): ?><?php foreach($technology_list_of_this_info as $tech): ?><?php if($tech == $cat->id) echo 'selected' ?><?php endforeach; ?><?php endif; ?>><?php echo $cat->name ?></option>
						                        	<?php endforeach; ?>
						                          </select>
						                    </fieldset>
						                </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <h4><u><b>Thông Số Kỹ Thuật:</b></u></h4>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <textarea name="specification" id="editor_1" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px; width:100%;"><?php echo $info->specification ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('editor_1');
                                                </script>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <h4><u><b>Thông Tin & Tài Liệu:</b></u></h4>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <input name="image_list_2[]" multiple="" type="file">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <?php  
                                                    $documentary_list = array();
                                                    if(is_array(json_decode($info->documentary))){
                                                        $documentary_list = json_decode($info->documentary);
                                                    }
                                                ?>
                                                <?php foreach($documentary_list as $row): ?>
                                                    <p><a href="<?php echo base_url('upload/product/'.$row) ?>" target="_blank" ><?php echo $row ?></a></p>
                                                <?php endforeach; ?>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-left">
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
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
                                                    if($info->image_link !== ''){
                                                        $image_link_of_this_info = base_url('upload/product/'.$info->image_link);
                                                    }
                                                ?>
                                                <fieldset class="form-group">
                                                    <center><img id="image" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo $image_link_of_this_info; ?>" /></center>
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

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                <h4><u><b>Hình ảnh Social (kích thước 800x418px):</b></u></h4>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <fieldset class="form-group">
                                                    <input name="social_image_link" type="file" id="files_social">
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <?php 
                                                    $social_image_link_of_this_info = public_url('site/images/no_image.jpg');
                                                    if($info->social_image_link !== ''){
                                                        $social_image_link_of_this_info = base_url('upload/product/'.$info->social_image_link);
                                                    }
                                                ?>
                                                <fieldset class="form-group">
                                                    <center><img id="image_social" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo $social_image_link_of_this_info ?>" /></center>
                                                    <script>
                                                        document.getElementById("files_social").onchange = function () {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            // get loaded data and render thumbnail.
                                                            document.getElementById("image_social").src = e.target.result;
                                                        };
                                                        // read the image file as a data URL.
                                                        reader.readAsDataURL(this.files[0]);
                                                        };
                                                    </script>
                                                </fieldset>
                                                <!-- END thẻ hiển thị view ảnh -->
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                <h4><u><b>Hình ảnh kèm theo (kích thước 800x418px):</b></u></h4>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <fieldset class="form-group">
                                                    <input id="gallery-photo-add" name="image_list[]" multiple="" type="file">
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <?php 
                                                    $image_list_of_this_info = array();
                                                    if(is_array(json_decode($info->image_list))){
                                                        $image_link_of_this_info = json_decode($info->image_list);
                                                    }
                                                ?>
                                                <fieldset id="image_list_preview" class="form-group">
                                                    <div id="gallery_image_list" class="gallery">
                                                        <?php foreach($image_link_of_this_info as $img): ?>
                                                            <?php $img_link = base_url('upload/product/'.$img); ?>
                                                            <img style="width:20vw; margin:5px;" src="<?php echo $img_link; ?>" />
                                                        <?php endforeach; ?>
                                                    </div>
                                                </fieldset>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                                                <script>
                                                    $(function() {
                                                        // Multiple images preview in browser
                                                        var imagesPreview = function(input, placeToInsertImagePreview) {

                                                            if (input.files) {
                                                                var filesAmount = input.files.length;

                                                                for (i = 0; i < filesAmount; i++) {
                                                                    var reader = new FileReader();

                                                                    reader.onload = function(event) {
                                                                        $($.parseHTML('<img style="width:20vw; margin:5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                                                    }

                                                                    reader.readAsDataURL(input.files[i]);
                                                                }
                                                            }

                                                        };

                                                        $('#gallery-photo-add').on('change', function() {
                                                            document.getElementById('gallery_image_list').innerHTML = '';
                                                            imagesPreview(this, 'div.gallery');
                                                        });
                                                    });
                                                </script>
                                                <!-- END thẻ hiển thị view ảnh -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-left" id="content">
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <h4><u><b>Nội dung:</b></u></h4>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicTextarea">Mô tả (Meta Descreption):</label>
                                                <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" placeholder="Nhập mô tả" required><?php echo $info->meta_desc ?></textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
                                                <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" placeholder="Nhập từ khóa" required><?php echo $info->meta_key ?></textarea>
                                            </fieldset>
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
				                          <i class="fa fa-check-square-o"></i> Update
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

<script type="text/javascript">
              
              function create_alias_<?php echo $info->id ?> (){
                if(document.getElementById("input_name_<?php echo $info->id ?>").value !== ''){ //Nếu có input_name
                  var input_alias_<?php echo $info->id ?> = document.getElementById("input_name_<?php echo $info->id ?>").value; // Lấy giá trị input name & chuyển thành alias
                  
                  //Replace về ký tự đặc biệt cấu trúc /['giá trị cần thay đổi']/gi - để thay đổi toàn bộ cả hoa cả thường /g để thay đổi chính xác, "['giá trị cần thay đổi']" để thay đổi 1 lần duy nhất
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('.').join('-'); // thay thế các ký tự đặc biệt
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('&').join('-'); 
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(')').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('(').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('?').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(':').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('/').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('@').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('#').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('%').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('_').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(',').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('!').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(';').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('%20').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(' ').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('+').join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('"').join(''); // Xóa các ký tự đặc biệt
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('*').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('^').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('~').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('`').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('=').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('[').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split(']').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('{').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('}').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split('|').join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("'").join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("ß").join('');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("--").join('-'); // Rút ngắn các khoảng trống liên tục
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("---").join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("----").join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.split("-----").join('-');
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/a|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a"); // Thay thế chữ cái về không dấu viết thường
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/b/gi, "b");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/c/gi, "c");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/d|đ/gi, "d");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/f/gi, "f");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/g/gi, "g");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/h/gi, "h");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/j/gi, "j");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/k/gi, "k");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/l/gi, "l");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/m/gi, "m");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/n/gi, "n");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/o|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/p/gi, "p");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/q/gi, "q");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/r/gi, "r");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/s/gi, "s");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/t/gi, "t");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/v/gi, "v");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/w/gi, "w");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/x/gi, "x");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
                  var input_alias_<?php echo $info->id ?> = input_alias_<?php echo $info->id ?>.replace(/z/gi, "z");
                  
                  document.getElementById('alias_<?php echo $info->id ?>').setAttribute("value",input_alias_<?php echo $info->id ?>); // Lấy giá trị input
                  document.getElementById('alias_<?php echo $info->id ?>').setAttribute("style","display:block;"); // Cho hiển thị input
                  
                  var check_alias_<?php echo $info->id ?> = '0';     // Thực hiện kiểm tra xem có trùng lặp alias hay không

                  <?php foreach($list as $cat): ?>
                    <?php if($cat->id !==  $info->id): ?> // đối với edit thì loại trừ id hiện tại trước khi check trùng lặp
                      if(document.getElementById('alias_<?php echo $info->id ?>').value !== ''){
                        if(document.getElementById('alias_<?php echo $info->id ?>').value == '<?php echo $cat->alias ?>'){
                          var check_alias_<?php echo $info->id ?> = '1';  
                        }
                      }
                    <?php endif; ?>
                  <?php endforeach; ?>

                  if(check_alias_<?php echo $info->id ?>  == '0'){ //Nếu không trùng lặp alias
                    document.getElementById('allert_error_<?php echo $info->id ?>').setAttribute("style","display:none;");
                    document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("style","display:block;");
                    document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("type","submit");
                    document.getElementById('alias_<?php echo $info->id ?>').setAttribute("name","alias");
                  }else{
                    document.getElementById('allert_error_<?php echo $info->id ?>').setAttribute("style","display:block;color:red;");
                    document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("style","display:none;");
                    document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("type","");
                    document.getElementById('alias_<?php echo $info->id ?>').setAttribute("name","");
                  }
                }else{ // Nếu không input name thì ẩn hết
                  document.getElementById('alias_<?php echo $info->id ?>').setAttribute("style","display:none;");
                  document.getElementById('alias_<?php echo $info->id ?>').setAttribute("name","");
                  document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("style","display:none;");
                  document.getElementById('submit_button_<?php echo $info->id ?>').setAttribute("type","");
                  document.getElementById('allert_error_<?php echo $info->id ?>').setAttribute("style","display:none;");
                }
              }
</script>
