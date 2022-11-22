<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row"> 
          <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Quản lý Dịch vụ nổi bật</h3>
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
                  <h4 class="card-title"><a data-action="collapse"><i class="ft-chevrons-down"></i> Dịch vụ cha: <?php echo $row->name ?></a> <span style="font-size: 0.8rem"><br/><i class="ft-chevron-right"></i> (Trạng thái: <?php if($row->status == '0'): ?><span style="color:green;">Hiển thị</span><?php else: ?><span style="color:red;">Không hiển thị</span><?php endif; ?> -- Thứ tự ưu tiên: <?php echo $row->sort_order ?> )</span></h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a title="Chỉnh sửa" href="" data-toggle="modal" data-target="#edit_id_<?php echo $row->id ?>"><i class="ft-align-justify"></i></a></li>
                      <li><a title="Xóa" href="" data-toggle="modal" data-target="#delete_id_<?php echo $row->id ?>" style="color:red;"><i class="ft-alert-octagon"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse hide">
                  
                  <div class="card-body card-dashboard" style="padding:0px;">
                    <section id="configuration" style="margin-left:10%;">
                      <!-- Show ra các danh mục cấp 2 -->
                      <?php foreach($row->subs as $subs): ?>
                        <div class="row">
                          <div class="col-12">
                            <div class="card" style="margin-bottom:0px ;">
                              <div class="card-header">
                                <span><i class="ft-corner-down-right"></i> Dịch vụ con: <b><?php echo $subs->name ?></b> <br/><i class="ft-chevron-right"></i> (Trạng thái: <?php if($subs->status == '0'): ?><span style="color:green;">Hiển thị</span><?php else: ?><span style="color:red;">Không hiển thị</span><?php endif; ?> -- Thứ tự ưu tiên: <?php echo $subs->sort_order ?> )</span>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                    <li><a title="Chỉnh sửa" href="" data-toggle="modal" data-target="#edit_id_<?php echo $subs->id ?>"><i class="ft-align-justify"></i></a></li>
                                    <li><a title="Xóa" href="" data-toggle="modal" data-target="#delete_id_<?php echo $subs->id ?>" style="color:red;"><i class="ft-alert-octagon"></i></a></li>
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
        <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END List -->                                        

      </div>
    </div>
  </div>


<!---------------------------------------------------------------------------------------------------------------------------------- Modal create -->
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Tạo mới Dịch vụ nổi bật</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form create -->
        <form class="form" action="<?php echo admin_url('hot_service/create_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên" required>
                  </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tiêu đề:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="title" placeholder="Nhập tiêu đề" required>
                  </fieldset> 
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Đường dẫn:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="link" placeholder="Nhập đường dẫn">
                  </fieldset>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Mô tả Ngắn:</label>
                    <textarea class="form-control" id="basicInput" name="meta_desc" rows="3" placeholder="Nhập đoạn mô tả ngắn"><textarea>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Dịch vụ cha:</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">-- Là dịch vụ cha--</option>
                      <?php foreach($list as $row): ?>
                        <option value="<?php echo $row->id ?>"><strong><?php echo $row->name ?></strong></option>
                      <?php endforeach; ?>
                    </select>
                  </fieldset>
                </div>
                

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0">ON</option>
                      <option value="1">OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order">
                  </fieldset>
                </div>

              </div>
              
              <div class="row justify-content-md-left" >
                  <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                      <h4><u><b>Hình ảnh:</b> <br/><em>(kích thước: 378x165px)</em></u></h4>
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
                      <h4><u><b>Hình ảnh nhỏ:</b> <br/><em>(kích thước: 378x165px)</em></u></h4>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                      <fieldset class="form-group">
                        <input name="thumb_image_link" type="file" id="thumb_files" required>
                      </fieldset>
                      <!-- Thẻ hiển thị Preview ảnh -->
                      <fieldset class="form-group">
                        <center><img id="thumb_image" style="max-height:300px;max-width:100%;background:#000000;" src="" /></center>
                        <script>
                          document.getElementById("thumb_files").onchange = function () {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                              // get loaded data and render thumbnail.
                              document.getElementById("thumb_image").src = e.target.result;
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
            <button id="submit_button" type="submit" class="btn btn-primary">Tạo mới</button>
          </div>
        </form>
        <!-- end form create -->
      </div>
    </div>
  </div>

<!---------------------------------------------------------------------------------------------------------------------------------- END Modal create -->


<!---------------------------------------------------------------------------------------------------------------------------------- Modal edit -->
  <?php foreach($list as $row): ?>
  <div class="modal fade" id="edit_id_<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa: "<?php echo $row->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('hot_service/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input type="" name="id" value="<?php echo $row->id ?>" style="display: none;">
                    <input id="" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên" value="<?php echo $row->name ?>">
                  </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Đường dẫn:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="link" placeholder="Nhập đường dẫn" value="<?php echo $row->link ?>">
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Dịch vụ cha:</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">-- Là dịch vụ cha--</option>
                      <?php foreach($list as $cat): ?>
                        <option value="<?php echo $cat->id ?>" <?php if($row->id == $cat->id) echo 'disabled' ?> <?php if($cat->id == $row->parent_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
                      <?php endforeach; ?>
                    </select>
                  </fieldset>
                </div>
                

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($row->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($row->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $row->sort_order ?>">
                  </fieldset>
                </div>

              </div>
              
              <div class="row justify-content-md-left" >
                  <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                      <h4><u><b>Hình ảnh:</b> <br/><em>(kích thước: 378x165px)</em></u></h4>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                      <fieldset class="form-group">
                        <input name="image_link" type="file" id="files_<?php echo $row->id ?>">
                      </fieldset>
                      <!-- Thẻ hiển thị Preview ảnh -->
                      <fieldset class="form-group">
                        <center><img id="image_<?php echo $row->id ?>" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo base_url('upload/hot_service/'.$row->image_link) ?>" /></center>
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
             
            </div>
          </div>

          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button id="submit_button" type="submit" class="btn btn-primary">Cập nhật</button>
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
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa: "<?php echo $subs->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('hot_service/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input type="" name="id" value="<?php echo $subs->id ?>" style="display: none;">
                    <input id="" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên" value="<?php echo $subs->name ?>">
                  </fieldset> 
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Đường dẫn:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="link" placeholder="Nhập đường dẫn" value="<?php echo $subs->link ?>">
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Dịch vụ cha:</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">-- Là dịch vụ cha--</option>
                      <?php foreach($list as $cat): ?>
                        <option value="<?php echo $cat->id ?>" <?php if($subs->id == $cat->id) echo 'disabled' ?> <?php if($cat->id == $subs->parent_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
                      <?php endforeach; ?>
                    </select>
                  </fieldset>
                </div>
                

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($subs->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($subs->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $subs->sort_order ?>">
                  </fieldset>
                </div>

              </div>
              
              <div class="row justify-content-md-left" >
                  <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                      <h4><u><b>Hình ảnh:</b> <br/><em>(kích thước: 378x165px)</em></u></h4>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                      <fieldset class="form-group">
                        <input name="image_link" type="file" id="files_<?php echo $subs->id ?>">
                      </fieldset>
                      <!-- Thẻ hiển thị Preview ảnh -->
                      <fieldset class="form-group">
                        <center><img id="image_<?php echo $subs->id ?>" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo base_url('upload/hot_service/'.$subs->image_link) ?>" /></center>
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
             
            </div>
          </div>

          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button id="submit_button" type="submit" class="btn btn-primary">Cập nhật</button>
          </div>
        </form>
        <!-- end form edit -->
      </div>
    </div>
  </div>
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
            <h5 class="modal-title" id="exampleModalLabel"><b>Không thể xóa: "<?php echo $row->name ?>"</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Dịch vụ này hiện đang chứa dịch vụ con phía dưới.
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
            <a href="<?php echo admin_url('hot_service/delete/'.$row->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal delete -->