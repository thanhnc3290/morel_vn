  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Quản lý Chân trang</h3>
          </div>
          <div class="content-header-right col-md-6 col-12">
              <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                  <a href="" data-toggle="modal" data-target="#edit_footer_desc" style="margin-right: 10px;">
                      <div class="btn-group" role="group">
                          <button class="btn btn-outline-primary" type="button"><i class="ft-plus-square icon-left"></i> Chỉnh sửa nội dung giới thiệu chân trang</button>
                      </div>
                  </a>
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
                          
                          <td><?php echo $row->name ?>
                            <br/>- Thứ tự ưu tiên: <?php echo $row->sort_order ?>
                          </td>
                          
                          <td>
                            <a data-toggle="modal" data-target="#edit_id_<?php echo $row->id ?>" title="chỉnh sửa"><i class="ft-edit"></i></a>
                            <a data-toggle="modal" data-target="#delete_id_<?php echo $row->id ?>" title="Xóa" style="color: red;margin-left: 20px;"><i class="ft-slash"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="width: 10%;text-align: center;">ID</th>
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

  <!---------------------------------------------------------------------------------------------------------------------------------- Modal edit_footer_desc -->
  <div class="modal fade" id="edit_footer_desc" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chỉnh sửa nội dung giới thiệu chân trang</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form edit total link -->
        <form class="form" action="<?php echo admin_url('footer/edit_footer_desc_modal') ?>" method="post" enctype="multipart/form-data">
           <div class="modal-body">
            <div class="card-body">
              <div class="row justify-content-md-left">
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <fieldset class="form-group">
                    <textarea name="footer_desc" id="editor" class="form-control" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 75px;"><?php echo $site_info->footer_desc ?></textarea>
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
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal edit total link -->



<!---------------------------------------------------------------------------------------------------------------------------------- Modal create -->
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:98%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Tạo mới chân trang</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- form create -->
        <form class="form" action="<?php echo admin_url('footer/create_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input id="input_name" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên" required>
                  </fieldset> 
                </div>


                <div class="col-xl-6 col-lg-6 col-md-12">
                  <fieldset class="form-group">
                    <label for="basicSelect">Danh mục:</label>
                    <select class="form-control" name="catalog_id" id="catalog_id" required>
                      <option value="">-- Lựa chọn danh mục--</option>
                      <?php foreach($catalog_list as $row): ?>
                        
                        <option value="<?php echo $row->id ?>" <?php if($row->url_status == '1') echo 'disabled' ?>><strong><?php echo $row->name ?></strong></option>
                        <?php foreach($row->subs as $subs): ?>
                          <option value="<?php echo $subs->id ?>" <?php if($subs->url_status == '1') echo 'disabled' ?>>-- <i><?php echo $subs->name ?></i></option>
                          <?php foreach($subs->subss as $subss): ?>
                            <option value="<?php echo $subss->id ?>" <?php if($subss->url_status == '1') echo 'disabled' ?>>-- -- <i><?php echo $subss->name ?></i></option>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </select>
                  </fieldset>
                </div>

                

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order" required>
                  </fieldset>
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
        <form class="form" action="<?php echo admin_url('footer/edit_modal') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card-body">

              <div class="row justify-content-md-left">
                
                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Tên:</label>
                    <input type="text" name="id" value="<?php echo $row->id ?>" style="display: none;">
                    <input id="" type="text" class="form-control" id="basicInput" name="name" placeholder="Nhập tên" value="<?php echo $row->name ?>" required>
                  </fieldset> 
                </div>



                <div class="col-xl-6 col-lg-6 col-md-12">
                  <fieldset class="form-group">
                    <label for="basicSelect">Danh mục:</label>
                    <select class="form-control" name="catalog_id" id="catalog_id_<?php echo $row->id ?>">
                      <?php foreach($catalog_list as $cat): ?>
                        <option value="<?php echo $cat->id ?>" <?php if($cat->url_status == '1') echo 'disabled' ?> <?php if($cat->id == $row->catalog_id) echo 'selected' ?>><strong><?php echo $cat->name ?></strong></option>
                        <?php foreach($cat->subs as $subs): ?>
                          <option value="<?php echo $subs->id ?>" <?php if($subs->url_status == '1') echo 'disabled' ?> <?php if($subs->id == $row->catalog_id) echo 'selected' ?>>-- <i><?php echo $subs->name ?></i></option>
                          <?php foreach($subs->subss as $subss): ?>
                            <option value="<?php echo $subss->id ?>" <?php if($subss->url_status == '1') echo 'disabled' ?> <?php if($subss->id == $row->catalog_id) echo 'selected' ?>>-- -- <i><?php echo $subss->name ?></i></option>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </select>
                  </fieldset>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                  <fieldset class="form-group">
                    <label for="basicInput">Thứ tự ưu tiên:</label>
                    <input type="number" class="form-control" id="basicInput" name="sort_order" value="<?php echo $row->sort_order ?>" required>
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
            <h5 class="modal-title" id="exampleModalLabel"><b>Xóa phần chân trang: "<?php echo $row->name ?>"</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Bạn đã chắc chắn?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            <a href="<?php echo admin_url('footer/delete/'.$row->id) ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<!---------------------------------------------------------------------------------------------------------------------------------- END Modal delete -->