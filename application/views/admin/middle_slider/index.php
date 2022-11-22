  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Quản lý Khoa & chuyên khoa</h3>
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
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Danh sách</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th style="width: 10%;text-align: center;">ID</th>
                          <th style="width: 25%;text-align: center;">Ảnh</th>
                          <th>Tên</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count_list = 0 ?>
                        <?php foreach($list as $row): ?>
                        <?php $count_list = $count_list + 1 ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $count_list ?></td>
                          <td style="text-align: center;">
                            <?php 
                              $image_of_this_info = '';
                              if($row->image_link !== ''){
                                $image_of_this_info = base_url('upload/middle_slider/'.$row->image_link);
                              }
                            ?>
                            <img src="<?php echo $image_of_this_info ?>" style="height: 150px;object-fit: cover;">
                              
                          </td>
                          <td><?php echo $row->name ?>
                            <br/>- Trạng thái: <?php if($row->status == '0'): ?>Hiển thị<?php else: ?>Không hiển thị<?php endif; ?>
                            <br/>- Thứ tự ưu tiên: <?php echo $row->sort_order ?>
                          </td>
                          
                          <td>
                            <!-- <a href="<?php echo admin_url('slider/edit/'.$row->id) ?>" title="chỉnh sửa"><i class="ft-edit"></i></a> -->
                            <!-- <a href="<?php echo admin_url('slider/delete/'.$row->id) ?>" title="Xóa" style="color: red;margin-left: 20px;"><i class="ft-slash"></i></a> -->
                            <a data-toggle="modal" data-target="#edit_id_<?php echo $row->id ?>" title="chỉnh sửa"><i class="ft-edit"></i></a>
                            <a data-toggle="modal" data-target="#delete_id_<?php echo $row->id ?>" title="Xóa" style="color: red;margin-left: 20px;"><i class="ft-slash"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="width: 10%;text-align: center;">ID</th>
                          <th style="width: 25%;text-align: center;">Ảnh</th>
                          <th>Tên</th>
                          <th>Thao tác</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<!---------------------------------------------------------------------------------------------------------------------------------- END List -->                                            

      </div>
    </div>
  </div>


<!---------------------------------------------------------------------------------------------------------------------------------- Modal create -->
  <div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Tạo mới</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form create -->
        <form class="form" action="<?php echo admin_url('middle_slider/create_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên slider" required>
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
                    <label for="basicInput">Nội dung:</label>
                    <textarea id="" type="text" class="form-control" id="basicInput" name="content" rows="3" placeholder="Nhập nội dung tối đa 175 ký tự" required></textarea>
                  </fieldset>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0">ON</option>
                      <option value="1">OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order">
                  </fieldset>
                </div>

              </div>
              
              <div class="row justify-content-md-left" >
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh Desktop (kích thước 791x450px):</b></u></h4>
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
  <div class="modal fade" id="edit_id_<?php echo $row->id ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa: "<?php echo $row->name ?>"</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit -->
        <form class="form" action="<?php echo admin_url('middle_slider/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input type="" name="id" style="display: none;" value="<?php echo $row->id ?>">
                    <input id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên slider" value="<?php echo $row->name?>">
                  </fieldset> 
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Đường dẫn:</label>
                    <input id="" type="text" class="form-control" id="basicInput" name="link" placeholder="Nhập đường dẫn" value="<?php echo $row->link ?>">
                  </fieldset>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Nội dung:</label>
                    <textarea id="" type="text" class="form-control" id="basicInput" name="content" rows="3" placeholder="Nhập nội dung tối đa 175 ký tự"><?php echo $row->content ?></textarea>
                  </fieldset>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicSelect">Trạng thái:</label>
                    <select class="form-control" id="basicSelect" name="status">
                      <option value="0" <?php if($row->status == '0') echo 'selected' ?>>ON</option>
                      <option value="1" <?php if($row->status == '1') echo 'selected' ?>>OFF</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $row->sort_order ?>">
                  </fieldset>
                </div>

              </div>
              
              <div class="row justify-content-md-left" >
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <h4><u><b>Hình ảnh Desktop (kích thước 791x450px):</b></u></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <fieldset class="form-group">
                    <input name="image_link" type="file" id="files_<?php echo $row->id ?>">
                  </fieldset>
                  <!-- Thẻ hiển thị Preview ảnh -->
                  <fieldset class="form-group">
                    <center><img id="image_<?php echo $row->id ?>" style="max-height:300px;max-width:100%;background:#000000;" src="<?php echo base_url('upload/middle_slider/'.$row->image_link) ?>" /></center>
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
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit -->

<!---------------------------------------------------------------------------------------------------------------------------------- Modal delete -->
  <?php foreach($list as $row): ?>
    <div class="modal fade" id="delete_id_<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
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
            <a href="<?php echo admin_url('middle_slider/delete/'.$row->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal delete -->