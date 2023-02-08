<div id="content" class="site-content">
    <style>
        .projects-header-content {
            background-image: url('');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="<?php echo public_url('site/css') ?>/autoptimize_single_ffd233f7aff712d3965050427f70d7aa.css">
    <div 
        class="projects-bg"
        style="background: url(<?php echo public_url('site/images') ?>/Projects-1920X550-light.jpg.webp);">
        <div class="projects-header">
            <div class="projects-header-content"> 
                <span class="projects-bread desktop_hide"> 
                    <a href="<?php echo base_url() ?>">Trang Chủ</a> &gt; 
                    Dự Án
                </span>
                <h1>Dự Án của Chúng Tôi</h1>
                <p>Tận dụng bí quyết âm thanh sâu rộng và công nghệ đổi mới, chúng tôi tự hào thông báo quan hệ đối tác đặc biệt với các nhà sản xuất ô tô và thuyền hiệu suất cao.</p>
            </div>
        </div>
    </div>
    <!-- desktop -->
    <div class="projects_slider_wrapper mobile_hide">
        <div class="slider-container">
            <div class="slider-content">
                <?php foreach($list as $row): ?>
                    <?php 
                        $url_of_row             = base_url('project/'.$row->alias.'-p'.$row->id);
                        $image_link_of_row      = public_url('site/images/no_image.jpg');
                        if($row->image_link !== ''){
                            $image_link_of_row  = base_url('upload/project/'.$row->image_link);
                        }
                        $name_of_row            = $row->name;
                        $desc_of_row            = mb_strimwidth($row->meta_desc,'0', '70' ,'...');
                    ?>
                <div class="slider-single"> 
                    <img class="slider-single-image" src="<?php echo $image_link_of_row ?>" alt="<?php echo $name_of_row ?>" style="object-fit:cover;" />
                    <div class="project-details-wrapper">
                        <h2 class="slider-single-title"><?php echo $name_of_row ?></h2>
                        <p style="color:white;"><?php echo $desc_of_row ?></p> 
                        <a title="<?php echo $name_of_row ?>" href="<?php echo $url_of_row?>" class="button">Xem Thêm</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div> 
            <a class="slider-left"  href="javascript:void(0);"><span class="carousel-control-prev-icon"></span></a> 
            <a class="slider-right" href="javascript:void(0);"><span class="carousel-control-next-icon"></span></a>
        </div>
    </div>
    <!-- end desktop -->
    <!-- mobile -->
    <div class="projects_mobile_wrapper desktop_hide">
        <?php foreach($list as $row): ?>
            <?php 
                $url_of_row             = base_url('project/'.$row->alias.'-p'.$row->id);
                $image_link_of_row      = public_url('site/images/no_image.jpg');
                if($row->image_link !== ''){
                    $image_link_of_row  = base_url('upload/project/'.$row->image_link);
                }
                $name_of_row            = $row->name;
                $desc_of_row            = mb_strimwidth($row->meta_desc,'0', '70' ,'...');
            ?>
        <div class="single-mobile"> 
            <img class="single-image-mobile" src="<?php echo $image_link_of_row ?>" alt="<?php echo $name_of_row ?>" />
            <div class="project-details-mobile">
                <h1 class="project-title-mobile"><?php echo $name_of_row ?></h1>
                <p><?php echo $desc_of_row ?></p> 
                <a title="<?php echo $name_of_row?>" href="<?php echo $url_of_row ?>" class="button">Xem Thêm</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- end mobile -->
    <script defer src="<?php echo public_url('site/js') ?>/autoptimize_single_90a4f847bab5d625ca1931efcfacf975.js"></script>
</div>