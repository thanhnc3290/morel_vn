<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          <span>TỔNG QUAN</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </li>
        
        <?php if($admin_position < '2'): //Quyền Admin và Chief ?>
        
        <li><a class="menu-item" href="<?php echo admin_url('site_info/edit/1') ?>">Thông tin website</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('home_page/edit/1') ?>">Chỉnh sửa trang chủ</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('admin') ?>">Danh sách Admin</a></li>
        <?php endif; ?>
        <li><a class="menu-item" href="<?php echo admin_url('catalog') ?>">Danh mục Sản Phẩm</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('product') ?>">Sản Phẩm</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('product_technology') ?>">Công Nghệ Sản Phẩm</a></li>
        
        <!-- <li><a class="menu-item" href="<?php echo admin_url('slider') ?>">Slider</a></li>
        
        <li><a class="menu-item" href="<?php echo admin_url('hot_service') ?>">Dịch vụ nổi bật</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('doctor_slider') ?>">Slider bác sĩ</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('video') ?>">Video Sứ Mệnh</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('before_after') ?>">Ảnh Trước - Sau</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('slider_news') ?>">Slider Tin Tức</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('news') ?>">Bài viết</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('contact') ?>">Liên hệ</a></li> -->
        <!-- <li><a class="menu-item" href="<?php echo admin_url('catalog_video') ?>">Danh mục Video</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('extension') ?>">Nút tiện ích</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('middle_slider') ?>">Khoa & Chuyên khoa</a></li>
        
        <li><a class="menu-item" href="<?php echo admin_url('news') ?>">Bài viết</a></li>
        <li><a class="menu-item" href="<?php echo admin_url('footer') ?>">Chân trang</a></li>
         -->
      </ul>
    </div>
  </div>