<div class="app-content content">
    <div class="content-wrapper">
      <?php $this->load->view('admin/admin/header'); ?>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Danh sách Tài Khoản ADMIN</h4>
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
                          <th>User name</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <?php foreach($list as $row): ?>
                          <?php if($admin_position == '0'): ?>
                            <tr>
                              <td><?php echo $row->username ?> (<?php if($admin_position == '0') echo 'Chief' ?><?php if($admin_position == '1') echo 'Admin' ?><?php if($admin_position == '2') echo 'Editor' ?>)</td>
                              <td><a href="<?php echo admin_url('admin/edit/'.$row->id) ?>" title="chỉnh sửa"><i class="ft-edit"></i></a><?php if($row->group_id !== '0'): ?><a href="<?php echo admin_url('admin/delete/'.$row->id) ?>" title="Xóa" style="color: red; padding-left: 4%;"><i class="ft-slash"></i></a><?php endif; ?></td>
                            </tr>
                          <?php else: ?>
                            <?php if($admin_position == '1'): ?>
                              <?php if($row->group_id !== '0'): ?>
                            <tr>
                              <td><?php echo $row->username ?> (<?php if($admin_position == '0') echo 'Chief' ?><?php if($admin_position == '1') echo 'Admin' ?><?php if($admin_position == '2') echo 'Editor' ?>)</td>
                              <td><a href="<?php echo admin_url('admin/edit/'.$row->id) ?>" title="chỉnh sửa"><i class="ft-edit"></i></a><a href="<?php echo admin_url('admin/delete/'.$row->id) ?>" title="Xóa" style="color: red; padding-left: 4%;"><i class="ft-slash"></i></a></td>
                            </tr>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php if($row->id == $admin_login_id): ?>
                            <tr>
                              <td><?php echo $row->username ?> (<?php if($admin_position == '0') echo 'Chief' ?><?php if($admin_position == '1') echo 'Admin' ?><?php if($admin_position == '2') echo 'Editor' ?>)</td>
                              <td><a href="<?php echo admin_url('admin/edit/'.$row->id) ?>" title="chỉnh sửa"><i class="ft-edit"></i></a></td>
                            </tr>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        
                      <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>User name</th>
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