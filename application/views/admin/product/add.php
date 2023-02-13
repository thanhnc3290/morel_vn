<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			<h3 class="content-header-title mb-0">Tạo mới Sản Phẩm</h3>
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
                                                <input onchange="create_alias()" id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên sản phẩm" required>
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Alias (tên đường dẫn):</label>
                                                <input style="display: none;" onchange="create_alias()" id="alias" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu">
                                                <label id="allert_error" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Danh mục Sản Phẩm:</label>
                                                <select class="form-control" id="basicSelect" name="catalog_id" required>
                                                <option value=""> --- Lựa chọn danh mục --- </option>
                                                <?php foreach($catalog_list as $row): ?>
                                                    <option value="<?php echo $row->id ?>" <?php if($row->status !== '0') { echo 'disabled';}?>><strong><?php echo $row->name ?></strong></option>
                                                    <?php foreach($row->subs as $subs): ?>
                                                    <option value="<?php echo $subs->id ?>" <?php if($subs->status !== '0') { echo 'disabled';}else{if($subs->redirect_link !== ''){echo 'disabled';}}?>>-- <i><?php echo $subs->name ?></i></option>
                                                    <?php foreach($subs->subss as $subss): ?>
                                                        <option value="<?php echo $subss->id ?>" <?php if($subss->status !== '0') { echo 'disabled';}else{if($subss->redirect_link  !== ''){echo 'disabled';}}?>><i>--  -- <?php echo $subss->name ?></i></option>
                                                    <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Trạng thái:</label>
                                                <select class="form-control" id="basicSelect" name="status">
                                                <option value="0">ON</option>
                                                <option value="1">OFF</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Thứ tự ưu tiên:</label>
                                                <input type="number" class="form-control" id="basicInput" name="sort_order">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3">
                                            <fieldset class="form-group">
                                                <label for="basicSelect">Dạng Layout:</label>
                                                <select class="form-control" id="basicSelect" name="layout_type">
                                                <option value="0">Layout 1</option>
                                                <!-- <option value="1">Layout 2</option> -->
                                                <option value="2">Layout 3</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 1:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_1" placeholder="Nhập tên Option 1" value="">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 1 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_1" placeholder="Nhập giá Option 1" value="">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 2:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_2" placeholder="Nhập tên Option 2" value="">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 2 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_2" placeholder="Nhập giá Option 2" value="">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 3:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_3" placeholder="Nhập tên Option 3" value="">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 3 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_3" placeholder="Nhập giá Option 3" value="">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tên Option 4:</label>
                                                <input type="text" class="form-control" id="basicInput" name="option_name_4" placeholder="Nhập tên Option 4" value="">
                                            </fieldset> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Giá Option 4 (USD):</label>
                                                <input type="number" class="form-control" id="basicInput" name="option_price_4" placeholder="Nhập giá Option 4" value="">
                                            </fieldset> 
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
							                <fieldset class="form-group">
							                	<label for="basicSelect">Công Nghệ Trong Sản Phẩm:</label>
												
						                          <select class="select2 form-control" id="basicSelect" name="technology_id[]" multiple>
                                                    <?php 
                                                        $technology_list_of_this_info = json_decode($info->technology_id);
                                                    ?>
						                          	<option>Select</option>
						                            <?php foreach($technology_list as $cat): ?>
						                            <option value="<?php echo $cat->id ?>" <?php if($cat->status > '0'){echo 'disabled';} ?> ><?php echo $cat->name ?></option>
						                        	<?php endforeach; ?>
						                          </select>
						                    </fieldset>
						                </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                            <h4><u><b>Thông Số Kỹ Thuật:</b></u></h4>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <textarea name="specification" id="editor_1" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px; width:100%;"></textarea>
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
                                        </div>
                                        
                                    </div>

                                    <div class="row justify-content-md-left">
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                                <h4><u><b>Hình ảnh (kích thước 400x250px):</b></u></h4>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <fieldset class="form-group">
                                                    <input name="image_link" type="file" id="files" required>
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <fieldset class="form-group">
                                                    <center><img id="image" style="max-height:300px;max-width:100%;background:#000000;" src="" /></center>
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
                                                    <input name="social_image_link" type="file" id="files_social" required>
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <fieldset class="form-group">
                                                    <center><img id="image_social" style="max-height:300px;max-width:100%;background:#000000;" src="" /></center>
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
                                                    <input id="gallery-photo-add" name="image_list[]" multiple="" type="file" required>
                                                </fieldset>
                                                <!-- Thẻ hiển thị Preview ảnh -->
                                                <fieldset id="image_list_preview" class="form-group">
                                                    <div id="gallery_image_list" class="gallery"></div>
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
                                                <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" placeholder="Nhập mô tả" required></textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
                                                <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" placeholder="Nhập từ khóa" required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <textarea name="content" id="editor_0" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px; width:100%;"></textarea>
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


<script type="text/javascript">
            function create_alias(){
              if(document.getElementById("input_name").value !== ''){ //Nếu có input Name
                var input_alias = document.getElementById("input_name").value; // Lấy giá trị input name & chuyển thành alias
                //Replace về ký tự đặc biệt cấu trúc /['giá trị cần thay đổi']/gi - để thay đổi toàn bộ cả hoa cả thường /g để thay đổi chính xác, "['giá trị cần thay đổi']" để thay đổi 1 lần duy nhất
					      var input_alias = input_alias.split('.').join('-'); // thay thế các ký tự đặc biệt
					      var input_alias = input_alias.split('&').join('-'); 
					      var input_alias = input_alias.split(')').join('-');
					      var input_alias = input_alias.split('(').join('-');
					      var input_alias = input_alias.split('?').join('-');
					      var input_alias = input_alias.split(':').join('-');
					      var input_alias = input_alias.split('/').join('-');
					    	var input_alias = input_alias.split('@').join('-');
					      var input_alias = input_alias.split('#').join('-');
					      var input_alias = input_alias.split('%').join('-');
					      var input_alias = input_alias.split('_').join('-');
					    	var input_alias = input_alias.split(',').join('-');
					      var input_alias = input_alias.split('!').join('-');
					    	var input_alias = input_alias.split(';').join('-');
					    	var input_alias = input_alias.split('%20').join('-');
					    	var input_alias = input_alias.split(' ').join('-');
					    	var input_alias = input_alias.split('+').join('-');

					      var input_alias = input_alias.split('"').join(''); // Xóa các ký tự đặc biệt
					      var input_alias = input_alias.split('*').join('');
					      var input_alias = input_alias.split('^').join('');
					      var input_alias = input_alias.split('~').join('');
					      var input_alias = input_alias.split('`').join('');
					      var input_alias = input_alias.split('=').join('');
					      var input_alias = input_alias.split('[').join('');
					      var input_alias = input_alias.split(']').join('');
					      var input_alias = input_alias.split('{').join('');
					      var input_alias = input_alias.split('}').join('');
					    	var input_alias = input_alias.split('|').join('');
					      var input_alias = input_alias.split("'").join('');
					      var input_alias = input_alias.split("ß").join('');

					      var input_alias = input_alias.split("--").join('-'); // Rút ngắn các khoảng trống liên tục
					      var input_alias = input_alias.split("---").join('-');
					      var input_alias = input_alias.split("----").join('-');
					      var input_alias = input_alias.split("-----").join('-');


					      var input_alias  = input_alias.replace(/a|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a"); // Thay thế chữ cái về không dấu viết thường
					      var input_alias  = input_alias.replace(/b/gi, "b");
					      var input_alias  = input_alias.replace(/c/gi, "c");
					      var input_alias  = input_alias.replace(/d|đ/gi, "d");
					      var input_alias  = input_alias.replace(/e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
					      var input_alias  = input_alias.replace(/f/gi, "f");
					      var input_alias  = input_alias.replace(/g/gi, "g");
					    	var input_alias  = input_alias.replace(/h/gi, "h");
					    	var input_alias  = input_alias.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
					      var input_alias  = input_alias.replace(/j/gi, "j");
					      var input_alias  = input_alias.replace(/k/gi, "k");
					      var input_alias  = input_alias.replace(/l/gi, "l");
					      var input_alias  = input_alias.replace(/m/gi, "m");
					      var input_alias  = input_alias.replace(/n/gi, "n");
					      var input_alias  = input_alias.replace(/o|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
					      var input_alias  = input_alias.replace(/p/gi, "p");
					      var input_alias  = input_alias.replace(/q/gi, "q");
					      var input_alias  = input_alias.replace(/r/gi, "r");
					      var input_alias  = input_alias.replace(/s/gi, "s");
					      var input_alias  = input_alias.replace(/t/gi, "t");
					      var input_alias  = input_alias.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
					      var input_alias  = input_alias.replace(/v/gi, "v");
					      var input_alias  = input_alias.replace(/w/gi, "w");
					      var input_alias  = input_alias.replace(/x/gi, "x");
					      var input_alias  = input_alias.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
                var input_alias  = input_alias.replace(/z/gi, "z");
                
					      document.getElementById('alias').setAttribute("value",input_alias); // Lấy giá trị input
					      document.getElementById('alias').setAttribute("style","display:block;"); // Cho hiển thị input

					      var check_alias = '0';     // Thực hiện kiểm tra xem có trùng lặp alias hay không
					      <?php foreach($list as $row): ?>
					        if(document.getElementById('alias').value !== ''){
					          if(document.getElementById('alias').value == '<?php echo $row->alias ?>'){
					            var check_alias = '1';  
					          }
                  }
                <?php endforeach; ?>
                if(check_alias  == '0'){ //Nếu không trùng lặp alias
					        document.getElementById('allert_error').setAttribute("style","display:none;");
					        document.getElementById('submit_button').setAttribute("style","display:block;");
									document.getElementById('submit_button').setAttribute("type","submit");
									document.getElementById('alias').setAttribute("name","alias");
					      }else{
					        document.getElementById('allert_error').setAttribute("style","display:block;color:red;");
					        document.getElementById('submit_button').setAttribute("style","display:none;");
									document.getElementById('submit_button').setAttribute("type","");
									document.getElementById('alias').setAttribute("name","");
                }
              }else{ // Nếu không input name thì ẩn hết
								document.getElementById('alias').setAttribute("style","display:none;");
								document.getElementById('alias').setAttribute("name","");
					      document.getElementById('submit_button').setAttribute("style","display:none;");
					      document.getElementById('submit_button').setAttribute("type","");
					      document.getElementById('allert_error').setAttribute("style","display:none;");
					    }
					  }
</script>


