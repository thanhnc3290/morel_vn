<?php 
    $info_image_link = public_url('site/images/no_image.jpg');
    if($info->image_link !== ''){
        $info_image_link = base_url('upload/project/'.$info->image_link);
    }
    $info_name       = $info->name;

    $info_image_list = array();
    if(is_array(json_decode($info->image_list))){
        $info_image_list = json_decode($info->image_list);
    }
?>
<div id="content" class="site-content">
    <style>
        .carousel-inner img {
            width: auto;
        }

        .image-item-mobile img {
            height: 2em;
            width: 100%;
        }

        .carousel-control-prev img,
        .carousel-control-next img {
            width: 20px;
        }

        .carousel-control-prev {
            left: -12px;
        }

        .carousel-control-next {
            right: -12px;
        }
    </style>
    <div class="projects-detail-wrapper mobile_hide">
        <div class="main-image-bg" style="background-image: url(<?php echo $info_image_link ?>);">
            <div class="container">
                <div class="images_list">
                    <div class="image-item active">
                        <img src="<?php echo $info_image_link ?>" alt="<?php echo $info_name ?>" width="80" height="80"/>
                    </div>
                    <?php foreach($info_image_list as $img): ?>
                    <div class="image-item">
                        <img src="<?php echo base_url('upload/project/'.$img) ?>" alt="<?php echo $info_name ?>" width="80" height="80"/>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="project_content"> 
                    <span class="title"><?php echo $info_name ?></span> 
                    <span class="contect_section" style="font-family: Roboto!important;"><?php echo $info->content; ?></span> 
                    <script language='javascript' type='text/javascript'>
                        function getWR360PopupSkin() {
                            return 'light_clean';
                        }
                    </script>
                    <a href="<?php echo base_url('project') ?>" class="button">Quay Lại</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container desktop_hide">
        <div class="projectsdetail-mobile-bread"> 
            <span class="projects-detail-bread desktop_hide"> 
                <a href="<?php echo base_url() ?>">Trang Chủ</a> &gt; 
                <a href="<?php echo base_url('project') ?>">Dự Án</a> &gt; 
                <?php echo $info_name; ?> 
            </span>
        </div>
        <div class="projectdetail-title-mobile">
            <h1><?php echo $info_name; ?></h1>
        </div>
        <div class="mobile-main-image-bg"> 
            <img src="<?php echo $info_image_link; ?>" alt="<?php echo $info_name; ?>">
        </div>
        <div id="demo111" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="thumb-images-mobile">
                        <div class="image-item-mobile"> 
                            <img src="<?php echo $info_image_link ?>" alt="<?php echo $info_name; ?>" width="80" height="80">
                        </div>
                        <?php foreach($info_image_list as $img): ?>
                        <div class="image-item-mobile"> 
                            <img src="<?php echo base_url('upload/project/'.$img) ?>" alt="<?php echo $info_name; ?>" width="80" height="80">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="thumb-images-mobile">
                        <div class="image-item-mobile"> 
                            <img src="<?php echo $info_image_link ?>" alt="<?php echo $info->name ?>" width="80" height="80">
                        </div>
                        <?php foreach($info_image_list as $img): ?>
                        <div class="image-item-mobile"> 
                            <img src="<?php echo base_url('upload/project/'.$img) ?>" alt="<?php echo $info->name ?>" width="80" height="80">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div> 
            <a class="carousel-control-prev" href="#demo111" data-slide="prev"><img src="<?php echo public_url('site/images') ?>/slide-left.svg"></a> 
            <a class="carousel-control-next" href="#demo111" data-slide="next"><img src="<?php echo public_url('site/images') ?>/slide-right.svg"></a>
        </div>
        <div class="project_content_mobile"> 
            <span class="contect_section_mobile" style="font-family: Roboto!important;"><?php echo $info->content; ?></span> 
            <a href="<?php echo base_url('project') ?>" class="button">Quay Lại</a>
        </div>
    </div>
    <script>
        jQuery(".image-item").click(function() {
            jQuery(".image-item").removeClass('active');
            jQuery(this).addClass('active');
            var current_image_url = jQuery(this).find('img').attr('src');
            jQuery('.main-image-bg').css('background-image', 'url(' + current_image_url + ')');
        });
        jQuery(".image-item-mobile").click(function() {

            jQuery(".image-item-mobile").removeClass('active');
            jQuery(this).addClass('active');
            var current_image_url = jQuery(this).find('img').attr('src');
            jQuery('.mobile-main-image-bg img').attr({
                'src': current_image_url
            });
        });
        //jQuery("#demo111").carousel({interval: 90000});
        jQuery(window).load(function() {
            jQuery('.carousel').carousel('pause');
        });
    </script>
</div>