  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Quản lý danh mục / dịch vụ</h3>
          </div>
          <div class="content-header-right col-md-6 col-12">
              <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                  <a href="" data-toggle="modal" data-target="#create">
                      <div class="btn-group" role="group">
                          <button class="btn btn-outline-primary" type="button"><i class="ft-plus-square icon-left"></i> Tạo Mới</button>
                      </div>
                  </a>
              </div>
          </div>
      </div>
      <div class="content-body">
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
<!---------------------------------------------------------------------------------------------------------------------------------- List -->
        <?php foreach($list as $row): ?>
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><a data-action="collapse"><i class="ft-chevrons-down"></i> Danh mục cấp 1: <?php echo $row->name ?></a> <span style="font-size: 0.8rem"><br/><i class="ft-chevron-right"></i> (Trạng thái: <?php if($row->status == '0'): ?><span style="color:green;">Hiển thị</span><?php else: ?><span style="color:red;">Không hiển thị</span><?php endif; ?> -- Thứ tự ưu tiên: <?php echo $row->sort_order ?> )</span></h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a title="Chỉnh sửa" href="<?php echo admin_url('catalog/edit/'.$row->id) ?>"><i class="ft-align-justify"></i></a></li> -->
                      <li><a title="Chỉnh sửa" href="" data-toggle="modal" data-target="#edit_id_<?php echo $row->id ?>"><i class="ft-align-justify"></i></a></li>
                      <li><a title="Xóa" href="" data-toggle="modal" data-target="#delete_id_<?php echo $row->id ?>" style="color:red;"><i class="ft-alert-octagon"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse hide">
                  
                  <?php foreach($row->subs as $subs): ?>
                  <!-- Show ra các danh mục cấp 2 -->
                  <section id="configuration" style="margin-left:5%;">
                    <div class="row">
                      <div class="col-12">
                        <div class="card" style="margin-bottom:0px;">
                          <div class="card-header">
                            <span><a data-action="collapse"><i class="ft-corner-down-right"></i> Danh mục cấp 2: <b><?php echo $subs->name ?></b></a> <br/><i class="ft-chevron-right"></i> (Trạng thái: <?php if($subs->status == '0'): ?><span style="color:green;">Hiển thị</span><?php else: ?><span style="color:red;">Không hiển thị</span><?php endif; ?> -- Thứ tự ưu tiên: <?php echo $subs->sort_order ?> )</span>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                              <ul class="list-inline mb-0">
                                <!-- <li><a title="Chỉnh sửa" href="<?php echo admin_url('catalog/edit/'.$subs->id) ?>"><i class="ft-align-justify"></i></a></li> -->
                                <li><a title="Chỉnh sửa" href="" data-toggle="modal" data-target="#edit_id_<?php echo $subs->id ?>"><i class="ft-align-justify"></i></a></li>
                                <li><a title="Xóa" href="" data-toggle="modal" data-target="#delete_id_<?php echo $subs->id ?>" style="color:red;"><i class="ft-alert-octagon"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="card-content collapse hide">
                            <div class="card-body card-dashboard" style="padding:0px;">
                              <section id="configuration" style="margin-left:10%;">
                                <!-- Show ra các danh mục cấp 3 -->
                                <?php foreach($subs->subss as $subss): ?>
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="card" style="margin-bottom:0px ;">
                                        <div class="card-header">
                                          <span><i class="ft-corner-down-right"></i> Danh mục cấp 3: <b><?php echo $subss->name ?></b> <br/><i class="ft-chevron-right"></i> (Trạng thái: <?php if($subss->status == '0'): ?><span style="color:green;">Hiển thị</span><?php else: ?><span style="color:red;">Không hiển thị</span><?php endif; ?> -- Thứ tự ưu tiên: <?php echo $subss->sort_order ?> )</span>
                                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                              <ul class="list-inline mb-0">
                                                <!-- <li><a title="Chỉnh sửa" href="<?php echo admin_url('catalog/edit/'.$subss->id) ?>"><i class="ft-align-justify"></i></a></li> -->
                                                <li><a title="Chỉnh sửa" href="" data-toggle="modal" data-target="#edit_id_<?php echo $subss->id ?>"><i class="ft-align-justify"></i></a></li>
                                                <li><a title="Xóa" href="" data-toggle="modal" data-target="#delete_id_<?php echo $subss->id ?>" style="color:red;"><i class="ft-alert-octagon"></i></a></li>
                                              </ul>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php endforeach; ?>
                              <!-- END Show ra các danh mục cấp 3 -->
                              </section>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- END Show ra các danh mục cấp 2 -->
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
          </div>
        </section>
        <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END List -->                                            

      </div>
    </div>
  </div>


<!---------------------------------------------------------------------------------------------------------------------------------- Modal create -->
  <div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Tạo mới danh mục</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form create -->
        <form class="form" action="<?php echo admin_url('catalog/create_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input onchange="create_alias()" id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên danh mục" required>
                  </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Alias (tên đường dẫn):</label>
                    <input style="display: none;" onchange="create_alias()" id="alias" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu">
                    <label id="allert_error" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                  </fieldset> 
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Redirect Url:</label>
                    <input  type="text" class="form-control" id="basicInput" name="redirect_link" placeholder="Nhập đường dẫn">
                  </fieldset> 
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Danh mục:</label>
                    <select class="form-control" id="basicSelect" name="parent_id">
                      <option value="0">Là danh mục cha</option>
                      <?php foreach($list as $row): ?>
                        <option value="<?php echo $row->id ?>"><strong><?php echo $row->name ?></strong></option>
                        <?php foreach($row->subs as $subs): ?>
                          <option value="<?php echo $subs->id ?>">-- <i><?php echo $subs->name ?></i></option>
                          <?php foreach($subs->subss as $subss): ?>
                            <option value="<?php echo $subss->id ?>">---- <i><?php echo $subss->name ?></i></option>
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
                      <option value="0">ON</option>
                      <option value="1">OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order">
                  </fieldset>
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

              </div>
              
              <div class="row justify-content-md-left">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh (kích thước 800x418px):</b></u></h4>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button id="submit_button" type="submit" class="btn btn-primary" style="display: none;">Tạo mới</button>
          </div>
        </form>
        <!-- end form create -->
      </div>
    </div>
  </div>

<!---------------------------------------------------------------------------------------------------------------------------------- END Modal create -->


<!---------------------------------------------------------------------------------------------------------------------------------- Modal edit -->
  <?php foreach($list as $row): ?>
  <div class="modal fade" id="edit_id_<?php echo $row->id ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa danh mục cấp 3: "<?php echo $row->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('catalog/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            
            <div class="card-body">
              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="basicInput">Tên:</label>
                      <input name="id" value="<?php echo $row->id ?>" style="display: none;"/>
                      <input oninput="create_alias_<?php echo $row->id ?>()" id="input_name_<?php echo $row->id ?>" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên danh mục" value="<?php echo $row->name ?>">
                    </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Alias (tên đường dẫn):</label>
                    <input style="" oninput="create_alias_<?php echo $row->id ?>()" id="alias_<?php echo $row->id ?>" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu" value="<?php echo $row->alias ?>">
                    <label id="allert_error_<?php echo $row->id ?>" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                  </fieldset> 
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Redirect Url:</label>
                    <input  type="text" class="form-control" id="basicInput" name="redirect_link" placeholder="Nhập đường dẫn" value="<?php echo $row->redirect_link; ?>">
                  </fieldset> 
                </div>
                <?php 
									//Tạo 2 biến để check xem $row là danh mục cấp 1/2/3
									$check_catalog_lv_1 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ
									$check_catalog_lv_2 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ
									foreach($list as $cat){
										if($cat->id == $row->id){
											foreach($cat->subs as $cat_subs){
												if(count($cat_subs->subss) > 0){
													$check_catalog_lv_1 = '1'; // Nghĩa là nếu $row là 1 danh mục cấp 1 có chứa danh mục cấp 2 & danh mục cấp 2 này chứa danh mục cấp 3, thì không cho lựa chọn nằm dưới bất kỳ danh mục nào
												}
											}
										}else{
											foreach($cat->subs as $cat_subs){
												if($cat_subs->id == $row->id){
													if(count($cat_subs->subss) > 0){
														$check_catalog_lv_2 = '1'; // Nghĩa là nếu $row là 1 danh mục cấp 2 có chứa danh mục cấp 3, thì không cho phép lựa chọn nằm dưới bất kỳ danh mục cấp 2 nào.
													}
												}
											}
										}
												
									}
								?>
                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicSelect">Danh mục:</label>
					          <select class="form-control" id="" name="parent_id">
											<option value="0">Là danh mục cha</option>
												<?php foreach($list as $cat): ?>
													<?php if($check_catalog_lv_1 == '0'): //Nếu $row phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ ?>
														<?php if($cat->id !== $row->id): ?>
															<option value="<?php echo $cat->id ?>" <?php if($cat->id == $row->parent_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
															<?php foreach($cat->subs as $cat_subs): ?>
																<?php if($check_catalog_lv_2 == '0'): // Nếu $row phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ ?>
																	<?php if($cat_subs->id !== $row->id): ?>
																		<option value="<?php echo $cat_subs->id ?>" <?php if($cat_subs->id == $row->parent_id) echo 'selected' ?>>-- <i><?php echo $cat_subs->name ?></i></option>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
					          </select>
					        </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($row->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($row->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicInput">Thứ tự ưu tiên:</label>
					          <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $row->sort_order ?>">
					        </fieldset>
                </div>

          
                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Mô tả (Meta Descreption):</label>
					          <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập mô tả"><?php echo $row->meta_desc ?></textarea>
                  </fieldset>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
					          <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập từ khóa"><?php echo $row->meta_key ?></textarea>
					        </fieldset>
                </div>
              
              </div>

              <div class="row justify-content-md-left">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh (kích thước 800x418px):</b></u></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <fieldset class="form-group">
                    <input name="image_link" type="file" id="files_<?php echo $row->id ?>">
                  </fieldset>
                  <?php
                    $image_link_of_this_info = '';
                    if($row->social_image_link !== ''){
											$image_link_of_this_info = base_url('upload/catalog_product/'.$row->social_image_link);
										} 
                  ?>
                  <!-- Thẻ hiển thị Preview ảnh -->
                  <fieldset class="form-group">
                    <center><img id="image_<?php echo $row->id ?>" style="max-height:300px;max-width:100%;" src="<?php echo $image_link_of_this_info ?>" /></center>
										<script>
											document.getElementById("files_<?php echo $row->id ?>").onchange = function () {
                        var reader = new FileReader();
                        reader.onload = function (e) {
													// get loaded data and render thumbnail.
													document.getElementById("image_<?php echo $row->id ?>").src = e.target.result;
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


            <script>
              function create_alias_<?php echo $row->id ?> (){
                if(document.getElementById("input_name_<?php echo $row->id ?>").value !== ''){ //Nếu có input_name
                  var input_alias_<?php echo $row->id ?> = document.getElementById("input_name_<?php echo $row->id ?>").value; // Lấy giá trị input name & chuyển thành alias
                  
                  //Replace về ký tự đặc biệt cấu trúc /['giá trị cần thay đổi']/gi - để thay đổi toàn bộ cả hoa cả thường /g để thay đổi chính xác, "['giá trị cần thay đổi']" để thay đổi 1 lần duy nhất
                  var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('.').join('-'); // thay thế các ký tự đặc biệt
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('&').join('-'); 
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(')').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('(').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('?').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(':').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('/').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('@').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('#').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('%').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('_').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(',').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('!').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(';').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('%20').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(' ').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('+').join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('"').join(''); // Xóa các ký tự đặc biệt
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('*').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('^').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('~').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('`').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('=').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('[').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split(']').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('{').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('}').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split('|').join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("'").join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("ß").join('');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("--").join('-'); // Rút ngắn các khoảng trống liên tục
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("---").join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("----").join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.split("-----").join('-');
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/a|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a"); // Thay thế chữ cái về không dấu viết thường
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/b/gi, "b");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/c/gi, "c");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/d|đ/gi, "d");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/f/gi, "f");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/g/gi, "g");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/h/gi, "h");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/j/gi, "j");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/k/gi, "k");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/l/gi, "l");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/m/gi, "m");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/n/gi, "n");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/o|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/p/gi, "p");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/q/gi, "q");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/r/gi, "r");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/s/gi, "s");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/t/gi, "t");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/v/gi, "v");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/w/gi, "w");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/x/gi, "x");
					        var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
                  var input_alias_<?php echo $row->id ?> = input_alias_<?php echo $row->id ?>.replace(/z/gi, "z");
                  
                  document.getElementById('alias_<?php echo $row->id ?>').setAttribute("value",input_alias_<?php echo $row->id ?>); // Lấy giá trị input
                  document.getElementById('alias_<?php echo $row->id ?>').setAttribute("style","display:block;"); // Cho hiển thị input
                  
                  var check_alias_<?php echo $row->id ?> = '0';     // Thực hiện kiểm tra xem có trùng lặp alias hay không

                  <?php foreach($list as $cat): ?>
					          <?php if($cat->id !==  $row->id): ?> // đối với edit thì loại trừ id hiện tại trước khi check trùng lặp
					            if(document.getElementById('alias_<?php echo $row->id ?>').value !== ''){
					              if(document.getElementById('alias_<?php echo $row->id ?>').value == '<?php echo $cat->alias ?>'){
					                var check_alias_<?php echo $row->id ?> = '1';  
					              }
					            }
                    <?php endif; ?>
                  <?php endforeach; ?>

                  if(check_alias_<?php echo $row->id ?>  == '0'){ //Nếu không trùng lặp alias
					          document.getElementById('allert_error_<?php echo $row->id ?>').setAttribute("style","display:none;");
					          document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("style","display:block;");
										document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("type","submit");
										document.getElementById('alias_<?php echo $row->id ?>').setAttribute("name","alias");
					        }else{
					          document.getElementById('allert_error_<?php echo $row->id ?>').setAttribute("style","display:block;color:red;");
					          document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("style","display:none;");
										document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("type","");
										document.getElementById('alias_<?php echo $row->id ?>').setAttribute("name","");
					        }
                }else{ // Nếu không input name thì ẩn hết
									document.getElementById('alias_<?php echo $row->id ?>').setAttribute("style","display:none;");
									document.getElementById('alias_<?php echo $row->id ?>').setAttribute("name","");
					        document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("style","display:none;");
					        document.getElementById('submit_button_<?php echo $row->id ?>').setAttribute("type","");
					        document.getElementById('allert_error_<?php echo $row->id ?>').setAttribute("style","display:none;");
					      }
              }
            </script>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" id="submit_button_<?php echo $row->id ?>" class="btn btn-primary">Cập nhật</button>
          </div>
        </form>
        <!-- end form edit -->
      </div>
    </div>
  </div>
    <?php foreach($row->subs as $subs): ?>
  <div class="modal fade" id="edit_id_<?php echo $subs->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa danh mục cấp 2: "<?php echo $subs->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('catalog/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            
            <div class="card-body">
              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="basicInput">Tên:</label>
                      <input name="id" value="<?php echo $subs->id ?>" style="display: none;"/>
                      <input oninput="create_alias_<?php echo $subs->id ?>()" id="input_name_<?php echo $subs->id ?>" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên danh mục" value="<?php echo $subs->name ?>">
                    </fieldset> 
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Alias (tên đường dẫn):</label>
                    <input style="" oninput="create_alias_<?php echo $subs->id ?>()" id="alias_<?php echo $subs->id ?>" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu" value="<?php echo $subs->alias ?>">
                    <label id="allert_error_<?php echo $subs->id ?>" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                  </fieldset> 
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Redirect Url:</label>
                    <input  type="text" class="form-control" id="basicInput" name="redirect_link" placeholder="Nhập đường dẫn" value="<?php echo $subs->redirect_link; ?>">
                  </fieldset> 
                </div>
                <?php 
									//Tạo 2 biến để check xem $subs là danh mục cấp 1/2/3
									$check_catalog_lv_1 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ
									$check_catalog_lv_2 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ
									foreach($list as $cat){
										if($cat->id == $subs->id){
											foreach($cat->subs as $cat_subs){
												if(count($cat_subs->subss) > 0){
													$check_catalog_lv_1 = '1'; // Nghĩa là nếu $subs là 1 danh mục cấp 1 có chứa danh mục cấp 2 & danh mục cấp 2 này chứa danh mục cấp 3, thì không cho lựa chọn nằm dưới bất kỳ danh mục nào
												}
											}
										}else{
											foreach($cat->subs as $cat_subs){
												if($cat_subs->id == $subs->id){
													if(count($cat_subs->subss) > 0){
														$check_catalog_lv_2 = '1'; // Nghĩa là nếu $subs là 1 danh mục cấp 2 có chứa danh mục cấp 3, thì không cho phép lựa chọn nằm dưới bất kỳ danh mục cấp 2 nào.
													}
												}
											}
										}
												
									}
								?>
                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicSelect">Danh mục:</label>
					          <select class="form-control" id="" name="parent_id">
											<option value="0">Là danh mục cha</option>
												<?php foreach($list as $cat): ?>
													<?php if($check_catalog_lv_1 == '0'): //Nếu $subs phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ ?>
														<?php if($cat->id !== $subs->id): ?>
															<option value="<?php echo $cat->id ?>" <?php if($cat->id == $subs->parent_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
															<?php foreach($cat->subs as $cat_subs): ?>
																<?php if($check_catalog_lv_2 == '0'): // Nếu $subs phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ ?>
																	<?php if($cat_subs->id !== $subs->id): ?>
																		<option value="<?php echo $cat_subs->id ?>" <?php if($cat_subs->id == $subs->parent_id) echo 'selected' ?>>-- <i><?php echo $cat_subs->name ?></i></option>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
					          </select>
					        </fieldset>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($subs->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($subs->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicInput">Thứ tự ưu tiên:</label>
					          <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $subs->sort_order ?>">
					        </fieldset>
                </div>

                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Mô tả (Meta Descreption):</label>
					          <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập mô tả"><?php echo $subs->meta_desc ?></textarea>
                  </fieldset>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
					          <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập từ khóa"><?php echo $subs->meta_key ?></textarea>
					        </fieldset>
                </div>
              
              </div>

              <div class="row justify-content-md-left">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh (kích thước 800x418px):</b></u></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <fieldset class="form-group">
                    <input name="image_link" type="file" id="files_<?php echo $subs->id ?>">
                  </fieldset>
                  <?php
                    $image_link_of_this_info = '';
                    if($subs->social_image_link !== ''){
											$image_link_of_this_info = base_url('upload/catalog_product/'.$subs->social_image_link);
										} 
                  ?>
                  <!-- Thẻ hiển thị Preview ảnh -->
                  <fieldset class="form-group">
                    <center><img id="image_<?php echo $subs->id ?>" style="max-height:300px;max-width:100%;" src="<?php echo $image_link_of_this_info ?>" /></center>
										<script>
											document.getElementById("files_<?php echo $subs->id ?>").onchange = function () {
                        var reader = new FileReader();
                        reader.onload = function (e) {
													// get loaded data and render thumbnail.
													document.getElementById("image_<?php echo $subs->id ?>").src = e.target.result;
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


            <script>
              function check_layout_<?php echo $subs->id ?>(){
								var layout_type_<?php echo $subs->id ?> = document.getElementById("layout_type_<?php echo $subs->id ?>").value; // Lấy giá trị select layout_type
								if(layout_type_<?php echo $subs->id ?>  == '999'){ //Nếu là dạng layout sử dụng landingpage
									document.getElementById('landingpage_url_<?php echo $subs->id ?>').setAttribute("style","display:block;");
					      }else{
									document.getElementById('landingpage_url_<?php echo $subs->id ?>').setAttribute("style","display:none;");
                }
              }

              function check_content_<?php echo $subs->id ?>(){
								var content_status_<?php echo $subs->id ?> = document.getElementById("content_status_<?php echo $subs->id ?>").value; // Lấy giá trị select content_status

								if(content_status_<?php echo $subs->id ?>  == '1'){ //Nếu là dạng danh mục có phần Content
									document.getElementById('layout_type_<?php echo $subs->id ?>').setAttribute("style","display:none;");
                  document.getElementById('landingpage_url_<?php echo $subs->id ?>').setAttribute("style","display:none;");
                  document.getElementById('content_<?php echo $subs->id ?>').setAttribute("style","display:block;");
					      }else{
                  document.getElementById('layout_type_<?php echo $subs->id ?>').setAttribute("style","display:block;");
                  var layout_type_<?php echo $subs->id ?> = document.getElementById("layout_type_<?php echo $subs->id ?>").value; // Lấy giá trị select layout_type
                  if(layout_type_<?php echo $subs->id ?>  == '999'){ //Nếu là dạng layout sử dụng landingpage
                    document.getElementById('landingpage_url_<?php echo $subs->id ?>').setAttribute("style","display:block;");
                  }else{
                    document.getElementById('landingpage_url_<?php echo $subs->id ?>').setAttribute("style","display:none;");
                  }
                  document.getElementById('content_<?php echo $subs->id ?>').setAttribute("style","display:none;");
					      }
              }
              
              function create_alias_<?php echo $subs->id ?> (){
                if(document.getElementById("input_name_<?php echo $subs->id ?>").value !== ''){ //Nếu có input_name
                  var input_alias_<?php echo $subs->id ?> = document.getElementById("input_name_<?php echo $subs->id ?>").value; // Lấy giá trị input name & chuyển thành alias
                  
                  //Replace về ký tự đặc biệt cấu trúc /['giá trị cần thay đổi']/gi - để thay đổi toàn bộ cả hoa cả thường /g để thay đổi chính xác, "['giá trị cần thay đổi']" để thay đổi 1 lần duy nhất
                  var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('.').join('-'); // thay thế các ký tự đặc biệt
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('&').join('-'); 
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(')').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('(').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('?').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(':').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('/').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('@').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('#').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('%').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('_').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(',').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('!').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(';').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('%20').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(' ').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('+').join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('"').join(''); // Xóa các ký tự đặc biệt
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('*').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('^').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('~').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('`').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('=').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('[').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split(']').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('{').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('}').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split('|').join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("'").join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("ß").join('');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("--").join('-'); // Rút ngắn các khoảng trống liên tục
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("---").join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("----").join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.split("-----").join('-');
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/a|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a"); // Thay thế chữ cái về không dấu viết thường
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/b/gi, "b");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/c/gi, "c");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/d|đ/gi, "d");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/f/gi, "f");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/g/gi, "g");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/h/gi, "h");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/j/gi, "j");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/k/gi, "k");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/l/gi, "l");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/m/gi, "m");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/n/gi, "n");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/o|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/p/gi, "p");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/q/gi, "q");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/r/gi, "r");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/s/gi, "s");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/t/gi, "t");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/v/gi, "v");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/w/gi, "w");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/x/gi, "x");
					        var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
                  var input_alias_<?php echo $subs->id ?> = input_alias_<?php echo $subs->id ?>.replace(/z/gi, "z");
                  
                  document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("value",input_alias_<?php echo $subs->id ?>); // Lấy giá trị input
                  document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("style","display:block;"); // Cho hiển thị input
                  
                  var check_alias_<?php echo $subs->id ?> = '0';     // Thực hiện kiểm tra xem có trùng lặp alias hay không

                  <?php foreach($list as $cat): ?>
					          <?php if($cat->id !==  $subs->id): ?> // đối với edit thì loại trừ id hiện tại trước khi check trùng lặp
					            if(document.getElementById('alias_<?php echo $subs->id ?>').value !== ''){
					              if(document.getElementById('alias_<?php echo $subs->id ?>').value == '<?php echo $cat->alias ?>'){
					                var check_alias_<?php echo $subs->id ?> = '1';  
					              }
					            }
                    <?php endif; ?>
                  <?php endforeach; ?>

                  if(check_alias_<?php echo $subs->id ?>  == '0'){ //Nếu không trùng lặp alias
					          document.getElementById('allert_error_<?php echo $subs->id ?>').setAttribute("style","display:none;");
					          document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("style","display:block;");
										document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("type","submit");
										document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("name","alias");
					        }else{
					          document.getElementById('allert_error_<?php echo $subs->id ?>').setAttribute("style","display:block;color:red;");
					          document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("style","display:none;");
										document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("type","");
										document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("name","");
					        }
                }else{ // Nếu không input name thì ẩn hết
									document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("style","display:none;");
									document.getElementById('alias_<?php echo $subs->id ?>').setAttribute("name","");
					        document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("style","display:none;");
					        document.getElementById('submit_button_<?php echo $subs->id ?>').setAttribute("type","");
					        document.getElementById('allert_error_<?php echo $subs->id ?>').setAttribute("style","display:none;");
					      }
              }
            </script>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" id="submit_button_<?php echo $subs->id ?>" class="btn btn-primary">Update</button>
          </div>
        </form>
        <!-- end form edit -->
      </div>
    </div>
  </div>
      <?php foreach($subs->subss as $subss): ?>
  <div class="modal fade" id="edit_id_<?php echo $subss->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa danh mục cấp 1: "<?php echo $subss->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('catalog/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            
            <div class="card-body">
              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="basicInput">Tên:</label>
                      <input name="id" value="<?php echo $subss->id ?>" style="display: none;"/>
                      <input oninput="create_alias_<?php echo $subss->id ?>()" id="input_name_<?php echo $subss->id ?>" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên danh mục" value="<?php echo $subss->name ?>">
                    </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Alias (tên đường dẫn):</label>
                    <input style="" oninput="create_alias_<?php echo $subss->id ?>()" id="alias_<?php echo $subss->id ?>" type="text" class="form-control" id="basicInput" name="alias" placeholder="Nhập tên đường dẫn. VD: danh-muc-dich-vu" value="<?php echo $subss->alias ?>">
                    <label id="allert_error_<?php echo $subss->id ?>" for="basicInput" style="color: red;display: none;"><i>*Tên đường dẫn bị trùng, hãy thay đổi.</i></label>
                  </fieldset> 
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Redirect Url:</label>
                    <input  type="text" class="form-control" id="basicInput" name="redirect_link" placeholder="Nhập đường dẫn" value="<?php echo $subss->redirect_link; ?>">
                  </fieldset> 
                </div>
                <?php 
									//Tạo 2 biến để check xem $subss là danh mục cấp 1/2/3
									$check_catalog_lv_1 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ
									$check_catalog_lv_2 = '0'; //Biến thể hiện cho phép lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ
									foreach($list as $cat){
										if($cat->id == $subss->id){
											foreach($cat->subs as $cat_subs){
												if(count($cat_subs->subss) > 0){
													$check_catalog_lv_1 = '1'; // Nghĩa là nếu $subss là 1 danh mục cấp 1 có chứa danh mục cấp 2 & danh mục cấp 2 này chứa danh mục cấp 3, thì không cho lựa chọn nằm dưới bất kỳ danh mục nào
												}
											}
										}else{
											foreach($cat->subs as $cat_subs){
												if($cat_subs->id == $subss->id){
													if(count($cat_subs->subss) > 0){
														$check_catalog_lv_2 = '1'; // Nghĩa là nếu $subss là 1 danh mục cấp 2 có chứa danh mục cấp 3, thì không cho phép lựa chọn nằm dưới bất kỳ danh mục cấp 2 nào.
													}
												}
											}
										}
												
									}
								?>
                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicSelect">Danh mục:</label>
					          <select class="form-control" id="" name="parent_id">
											<option value="0">Là danh mục cha</option>
												<?php foreach($list as $cat): ?>
													<?php if($check_catalog_lv_1 == '0'): //Nếu $subss phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 1 bất kỳ ?>
														<?php if($cat->id !== $subss->id): ?>
															<option value="<?php echo $cat->id ?>" <?php if($cat->id == $subss->parent_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
															<?php foreach($cat->subs as $cat_subs): ?>
																<?php if($check_catalog_lv_2 == '0'): // Nếu $subss phù hợp để được lựa chọn nằm dưới 1 danh mục cấp 2 bất kỳ ?>
																	<?php if($cat_subs->id !== $subss->id): ?>
																		<option value="<?php echo $cat_subs->id ?>" <?php if($cat_subs->id == $subss->parent_id) echo 'selected' ?>>-- <i><?php echo $cat_subs->name ?></i></option>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
					          </select>
					        </fieldset>
                </div>

                
                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($subss->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($subss->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
					        <fieldset class="form-group">
					          <label for="basicInput">Thứ tự ưu tiên:</label>
					          <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $subss->sort_order ?>">
					        </fieldset>
                </div>

                
                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Mô tả (Meta Descreption):</label>
					          <textarea name="meta_desc" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập mô tả"><?php echo $subss->meta_desc ?></textarea>
                  </fieldset>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12">
					        <fieldset class="form-group">
					          <label for="basicTextarea">Từ khóa (Meta Keywords):</label>
					          <textarea name="meta_key" class="form-control" id="basicTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" placeholder="Nhập từ khóa"><?php echo $subss->meta_key ?></textarea>
					        </fieldset>
                </div>
              
              </div>

              <div class="row justify-content-md-left">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh (kích thước 800x418px):</b></u></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <fieldset class="form-group">
                    <input name="image_link" type="file" id="files_<?php echo $subss->id ?>">
                  </fieldset>
                  <?php
                    $image_link_of_this_info = '';
                    if($subss->social_image_link !== ''){
											$image_link_of_this_info = base_url('upload/catalog_product/'.$subss->social_image_link);
										} 
                  ?>
                  <!-- Thẻ hiển thị Preview ảnh -->
                  <fieldset class="form-group">
                    <center><img id="image_<?php echo $subss->id ?>" style="max-height:300px;max-width:100%;" src="<?php echo $image_link_of_this_info ?>" /></center>
										<script>
											document.getElementById("files_<?php echo $subss->id ?>").onchange = function () {
                        var reader = new FileReader();
                        reader.onload = function (e) {
													// get loaded data and render thumbnail.
													document.getElementById("image_<?php echo $subss->id ?>").src = e.target.result;
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


            <script>
              function check_layout_<?php echo $subss->id ?>(){
								var layout_type_<?php echo $subss->id ?> = document.getElementById("layout_type_<?php echo $subss->id ?>").value; // Lấy giá trị select layout_type
								if(layout_type_<?php echo $subss->id ?>  == '999'){ //Nếu là dạng layout sử dụng landingpage
									document.getElementById('landingpage_url_<?php echo $subss->id ?>').setAttribute("style","display:block;");
					      }else{
									document.getElementById('landingpage_url_<?php echo $subss->id ?>').setAttribute("style","display:none;");
                }
              }

              function check_content_<?php echo $subss->id ?>(){
								var content_status_<?php echo $subss->id ?> = document.getElementById("content_status_<?php echo $subss->id ?>").value; // Lấy giá trị select content_status

								if(content_status_<?php echo $subss->id ?>  == '1'){ //Nếu là dạng danh mục có phần Content
									document.getElementById('layout_type_<?php echo $subss->id ?>').setAttribute("style","display:none;");
                  document.getElementById('landingpage_url_<?php echo $subss->id ?>').setAttribute("style","display:none;");
                  document.getElementById('content_<?php echo $subss->id ?>').setAttribute("style","display:block;");
					      }else{
									document.getElementById('layout_type_<?php echo $subss->id ?>').setAttribute("style","display:block;");
                  document.getElementById('landingpage_url_<?php echo $subss->id ?>').setAttribute("style","display:block;");
                  document.getElementById('content_<?php echo $subss->id ?>').setAttribute("style","display:none;");
					      }
              }
              
              function create_alias_<?php echo $subss->id ?> (){
                if(document.getElementById("input_name_<?php echo $subss->id ?>").value !== ''){ //Nếu có input_name
                  var input_alias_<?php echo $subss->id ?> = document.getElementById("input_name_<?php echo $subss->id ?>").value; // Lấy giá trị input name & chuyển thành alias
                  
                  //Replace về ký tự đặc biệt cấu trúc /['giá trị cần thay đổi']/gi - để thay đổi toàn bộ cả hoa cả thường /g để thay đổi chính xác, "['giá trị cần thay đổi']" để thay đổi 1 lần duy nhất
                  var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('.').join('-'); // thay thế các ký tự đặc biệt
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('&').join('-'); 
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(')').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('(').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('?').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(':').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('/').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('@').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('#').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('%').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('_').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(',').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('!').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(';').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('%20').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(' ').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('+').join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('"').join(''); // Xóa các ký tự đặc biệt
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('*').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('^').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('~').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('`').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('=').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('[').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split(']').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('{').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('}').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split('|').join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("'").join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("ß").join('');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("--").join('-'); // Rút ngắn các khoảng trống liên tục
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("---").join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("----").join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.split("-----").join('-');
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/a|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a"); // Thay thế chữ cái về không dấu viết thường
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/b/gi, "b");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/c/gi, "c");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/d|đ/gi, "d");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/f/gi, "f");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/g/gi, "g");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/h/gi, "h");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/j/gi, "j");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/k/gi, "k");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/l/gi, "l");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/m/gi, "m");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/n/gi, "n");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/o|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/p/gi, "p");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/q/gi, "q");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/r/gi, "r");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/s/gi, "s");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/t/gi, "t");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/v/gi, "v");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/w/gi, "w");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/x/gi, "x");
					        var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/y|ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
                  var input_alias_<?php echo $subss->id ?> = input_alias_<?php echo $subss->id ?>.replace(/z/gi, "z");
                  
                  document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("value",input_alias_<?php echo $subss->id ?>); // Lấy giá trị input
                  document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("style","display:block;"); // Cho hiển thị input
                  
                  var check_alias_<?php echo $subss->id ?> = '0';     // Thực hiện kiểm tra xem có trùng lặp alias hay không

                  <?php foreach($list as $cat): ?>
					          <?php if($cat->id !==  $subss->id): ?> // đối với edit thì loại trừ id hiện tại trước khi check trùng lặp
					            if(document.getElementById('alias_<?php echo $subss->id ?>').value !== ''){
					              if(document.getElementById('alias_<?php echo $subss->id ?>').value == '<?php echo $cat->alias ?>'){
					                var check_alias_<?php echo $subss->id ?> = '1';  
					              }
					            }
                    <?php endif; ?>
                  <?php endforeach; ?>

                  if(check_alias_<?php echo $subss->id ?>  == '0'){ //Nếu không trùng lặp alias
					          document.getElementById('allert_error_<?php echo $subss->id ?>').setAttribute("style","display:none;");
					          document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("style","display:block;");
										document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("type","submit");
										document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("name","alias");
					        }else{
					          document.getElementById('allert_error_<?php echo $subss->id ?>').setAttribute("style","display:block;color:red;");
					          document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("style","display:none;");
										document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("type","");
										document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("name","");
					        }
                }else{ // Nếu không input name thì ẩn hết
									document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("style","display:none;");
									document.getElementById('alias_<?php echo $subss->id ?>').setAttribute("name","");
					        document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("style","display:none;");
					        document.getElementById('submit_button_<?php echo $subss->id ?>').setAttribute("type","");
					        document.getElementById('allert_error_<?php echo $subss->id ?>').setAttribute("style","display:none;");
					      }
              }
            </script>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" id="submit_button_<?php echo $subss->id ?>" class="btn btn-primary">Update</button>
          </div>
        </form>
        <!-- end form edit -->
      </div>
    </div>
  </div>
      <?php endforeach; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit -->

<!---------------------------------------------------------------------------------------------------------------------------------- Modal delete -->
  <?php foreach($list as $row): ?>
    <div class="modal fade" id="delete_id_<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php if(count($row->subs) > '0'): ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Không thể xóa danh mục cấp 1: "<?php echo $row->name ?>"</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Danh mục này hiện đang chứa danh mục & nội dung bài viết phía dưới.
          </div>
          <?php else: ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Xóa "<?php echo $row->name ?>"</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Bạn đã chắc chắn?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            <a href="<?php echo admin_url('catalog/delete/'.$row->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
      <?php foreach($row->subs as $subs): ?>
        <div class="modal fade" id="delete_id_<?php echo $subs->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <?php if(count($subs->subss) > '0'): ?>
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Không thể xóa danh mục cấp 2: "<?php echo $subs->name ?>"</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Danh mục này hiện đang chứa danh mục & nội dung bài viết phía dưới.
              </div>
              <?php else: ?>
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Xóa "<?php echo $subs->name ?>"</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Bạn đã chắc chắn?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                <a href="<?php echo admin_url('catalog/delete/'.$subs->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php foreach($subs->subss as $subss): ?>
          <div class="modal fade" id="delete_id_<?php echo $subss->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <?php 
                  $check_content_list = '0';
                  foreach($product_list as $news){
                    if($news->catalog_id == $subss->id){
                      $check_content_list = '1'; // Kiểm tra danh mục con này có chứa các bài viết liên quan hay không
                    }
                  }
                ?>
                <?php if($check_content_list !== '0'): // Nếu danh mục cấp 3 này có chứa nội dung ?>
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><b>Không thể xóa danh mục cấp 3: "<?php echo $subss->name ?>"</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Danh mục này hiện đang chứa các nội dung bài viết phía dưới.
                </div>
                <?php else: ?>
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><b>Xóa "<?php echo $subss->name ?>"</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Bạn đã chắc chắn?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                  <a href="<?php echo admin_url('catalog/delete/'.$subss->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
  <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal delete -->