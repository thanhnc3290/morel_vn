
<div id="content" class="site-content">
    <div class="blog-bg" style="background: url(<?php echo public_url('site/images') ?>/Cabessa-021-tiny.jpg.webp);">
            <div class="projects-header">
                <div class="projects-header-content"> 
                    <span class="projects-bread desktop_hide"> 
                        <a href="https://www.morelhifi.com">Trang Chủ</a> &gt; Blog 
                    </span>
                    <h1 class="blog-header">Blog</h1>
                    <p>Khám phá tất cả các tin tức, sự kiện và nội dung đặc biệt mới nhất của chúng tôi</p>
                </div>
            </div>
        </div>
        <div class="blog_wrapper">
            <div class="container">
                <div class="row">
                    <?php foreach($list as $row): ?>
                        <?php 
                            $name_of_row = $row->name;
                            $desc_of_row = mb_strimwidth($row->meta_desc,'0','70','...');    
                            $image_link_of_row = public_url('site/images/no_image.jpg');
                            if($row->image_link !== ''){
                                $image_link_of_row = base_url('upload/news/'.$row->image_link);
                            }
                            $url_of_row = base_url('blog/'.$row->alias.'-n'.$row->id);
                        ?>
                    <div class="col-md-4 blog_wrap"> 
                        <img src="<?php echo $image_link_of_row ?>" alt="<?php echo $name_of_row ?>">
                        <div class="blog_details">
                            <h2 class="blog_headline"> 
                                <a href="<?php echo $url_of_row ?>" title="<?php echo $name_of_row ?>" style="font-family: Roboto;"><?php echo $name_of_row ?></a>
                            </h2>
                            <p  style="font-family: Roboto;"><?php echo $desc_of_row ?></p> 
                            <a href="<?php echo $url_of_row ?>" class="button">Xem Thêm</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>