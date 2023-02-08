<div id="content" class="site-content">
    <div class="blog-detail-bg blog-bg mobile_hide"
        style="background: url(<?php echo public_url('site/images') ?>/Cabessa-021-tiny.jpg.webp);">
        <div class="projects-header">
            <div class="projects-header-content"> 
                <span class="blog-header"> Blog </span>
                <p style="font-family: Roboto;">Khám phá tất cả các tin tức, sự kiện và nội dung đặc biệt mới nhất của chúng tôi</p>
                <script language='javascript' type='text/javascript'>
                    function getWR360PopupSkin() {
                        return 'light_clean';
                    }
                </script>
                </p>
            </div>
        </div>
    </div>
    <div class="blog_detail_page">
        <div class="container">
            <div class="breadcrumbs">
                <span>
                    <span><a href="<?php echo base_url() ?>"  style="font-family: Roboto;">Trang Chủ</a></span> » 
                    <span><a href="<?php echo base_url('blog') ?>"  style="font-family: Roboto;">Blog</a></span> » 
                    <span class="breadcrumb_last" aria-current="page"  style="font-family: Roboto;"><?php echo $info->name ?></span>
                </span>
            </div>
            <h1 class="article-title"  style="font-family: Roboto;"><?php echo $info->name ?></h1>
            <div class="entry-content" style="font-family: Roboto;">
                <?php echo $info->content ?>
            </div>
            <div class="additional_blog">
                <h2 style="font-family:Roboto;">Bài Viết Liên Quan<h2>
                        <div class="row">
                            <?php $count_relate = '0'; ?>
                            <?php foreach($list as $row): ?>
                                <?php if($row->id !== $info->id): ?>
                                    <?php $count_relate++; ?>
                                    <?php if($count_relate <= '3'): ?>
                                        <?php 
                                            $name_of_row        = $row->name;
                                            $desc_of_row        = mb_strimwidth($row->desc,'0','100','...');
                                            $image_link_of_row  = public_url('site/images/no_image.jpg');
                                            if($row->image_link !== ''){
                                                $image_link_of_row = base_url('upload/news/'.$row->image_link);
                                            }
                                            $url_of_row         = base_url('blog/'.$row->alias.'-n'.$row->id);
                                        ?>
                            <div class="col-md-4 blog_wrap">
                                <img class="" src="<?php echo $image_link_of_row ?>" alt="<?php echo $name_of_row ?>" />
                                <div class="blog_details">
                                    <h3 class="blog_headline" style="font-family: Roboto;"><?php echo $name_of_row ?></h3>
                                    <p  style="font-family: Roboto;"><?php echo $desc_of_row ?></p> 
                                    <a href="<?php echo $url_of_row ?>" class="button" style="font-family: Roboto;">Xem thêm</a>
                                </div>
                            </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
            </div>
            <div class="singleblog_backbutton mobile_hide"><a href="<?php echo base_url('blog'); ?>" class="button"  style="font-family: Roboto;">Quay Lại</a></div>
        </div>
    </div>
</div>