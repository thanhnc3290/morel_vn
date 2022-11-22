  <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">Quản lý tài khoản</h3>
        </div>
        
        <?php if($admin_position < '2'): // Nghĩa là quyền Admin hoặc Chief ?>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="<?php echo admin_url('admin/add') ?>">
              <div class="btn-group" role="group">
                <button class="btn btn-outline-primary" type="button" ><i class="ft-plus-square icon-left"></i> Tạo Mới Tài Khoản</button>
              </div>
            </a>
          </div>
        </div>
        <?php endif; ?>

      </div>