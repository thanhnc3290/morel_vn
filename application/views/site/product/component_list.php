<section class="section-product-components" id="components">
    <div class="ys-container">
        <h2 class="section-title"> Các Thành Phần</h2>
        <div class="slider-wrap slider-components-wrap fade-in">
            <div class="ys-slider ys-slider-components">
                <?php foreach($component_list as $row): ?>
                    <?php 
                        $image_of_row = public_url('site/images/no_image.jpg');
                        if($row->image_link !== ''){
                            $image_of_row = base_url('upload/product/'.$row->image_link);
                        }
                        $url_of_row = base_url('product/'.$row->alias.'-p'.$row->id);
                    ?>
                <div class="slide">
                    <div class="slide-in"> 
                        <a href="<?php echo $url_of_row ?>">
                            <div class="entry-image"> 
                                <img 
                                    width="300" height="300" 
                                    src="<?php echo $image_of_row ?>" 
                                    class="attachment-medium size-medium wp-post-image" alt="<?php echo $row->name ?>"
                                    decoding="async" loading="lazy"
                                    srcset="
                                        <?php echo $image_of_row ?> 300w,  
                                        <?php echo $image_of_row ?> 170w,  
                                        <?php echo $image_of_row ?> 100w,  
                                        <?php echo $image_of_row ?> 400w,  
                                        <?php echo $image_of_row ?> 1024w,  
                                        <?php echo $image_of_row ?> 150w,  
                                        <?php echo $image_of_row ?> 768w,  
                                        <?php echo $image_of_row ?> 1500w"
                                    sizes="(max-width: 300px) 100vw, 300px" /></div>
                            <h3 class="entry-title"><?php echo $row->name ?></h3>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>