<div class="app-content content">
    <div class="content-wrapper">
      <?php $this->load->view('admin/contact/header'); ?>
      <div class="content-body"> 
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Danh sách Contact</h4>
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
                          <th>ID</th>
                          <th>Mã liên hệ</th>
                          <th>Tên</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Ngày tạo</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($list as $row): ?>
                        <tr>
                          <td><?php echo $row->id ?></td>
                          <td><?php if($row->type == '0') echo 'dangky_tuvan_' ?><?php if($row->type == '1') echo 'subcribes_' ?><?php echo $row->created ?></td>
                          <td><?php echo $row->name ?></td>
                          <td><?php if($row->email !==''): ?><?php echo $row->email ?><?php else: ?>N/a<?php endif; ?></td>
                          <td><?php echo $row->phone ?></td>
                          <td><?php echo get_date($row->created) ?> (<?php if($row->status == '0'): ?><span style="color: green;">Chưa Xử Lý</span><?php else: ?><span style="color: orange;">Đã xử lý</span><?php endif; ?>)</td>
                          <td><a href="<?php echo admin_url('contact/edit/'.$row->id) ?>" title="chỉnh sửa"><i class="ft-edit"></i></a></td>
                        </tr>
                      <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Mã liên hệ</th>
                          <th>Tên</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Ngày tạo</th>
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
        
      </div>
    </div>
  </div>