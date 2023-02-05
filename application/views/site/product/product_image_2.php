<?php 
    $image_link_of_this_info = public_url('site/images/no_image.jpg');
    if($info->image_link !== ''){
        $image_link_of_this_info = base_url('upload/product/'.$info->image_link);
    }
    
    $image_list_of_this_info = array();
    if(is_array(json_decode($info->image_list))){
        $image_list_of_this_info = json_decode($info->image_list);
    }
?>

<div 
    class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
    data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <figure class="woocommerce-product-gallery__wrapper">
        <div class="entry-ys-slider entry-ys-slider-sync">
            <div class="entry-ys-slider-for">
                <div class="ys-slider slider-for">

                    <div class="slide">
                        <div class="entry-image"> 
                            <a href="<?php echo $image_link_of_this_info ?>" data-fancybox> 
                                <img src="<?php echo $image_link_of_this_info ?>" alt="<?php echo $info->name ?>" />
                            </a>
                        </div>
                    </div>
                    
                    <?php foreach($image_list_of_this_info as $img): ?>
                        <?php 
                            $img_link = base_url('upload/product/'.$img);
                        ?>
                    <div class="slide">
                        <div class="entry-image"> 
                            <a href="<?php echo $img_link ?>" data-fancybox> 
                                <img src="<?php echo $img_link ?>" alt="<?php echo $info->name ?>" />
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="entry-ys-slider-nav">
                <div class="ys-slider slider-nav">
                    <div class="slide">
                        <div class="entry-image"> 
                            <img src="<?php echo $image_link_of_this_info ?>" alt="<?php echo $info->name ?>" />
                        </div>
                    </div>
                    <?php foreach($image_list_of_this_info as $img): ?>
                        <?php 
                            $img_link = base_url('upload/product/'.$img);
                        ?>
                    <div class="slide">
                        <div class="entry-image"> 
                            <img src="<?php echo $img_link ?>" alt="<?php echo $info->name ?>" />
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </figure>
</div>