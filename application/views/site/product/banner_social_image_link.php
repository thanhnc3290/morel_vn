<?php 
    $banner_social_image_link = public_url('site/images/no_image.jpg');
    if($info->social_image_link !== ''){
        $banner_social_image_link = base_url('upload/product/'.$info->social_image_link);
    }
?>
<section class="section-product-hero" id="hero">
    <figure class="entry-image"> 
        <img 
            width="1920" 
            height="880" 
            src="<?php echo $banner_social_image_link; ?>" 
            class="attachment-full size-full" alt="<?php echo $info->name ?>" decoding="async" loading="lazy"
            srcset="
                <?php echo $banner_social_image_link; ?> 1920w,  
                <?php echo $banner_social_image_link; ?> 170w,  
                <?php echo $banner_social_image_link; ?> 400w,  
                <?php echo $banner_social_image_link; ?> 300w,  
                <?php echo $banner_social_image_link; ?> 1024w,  
                <?php echo $banner_social_image_link; ?> 768w,  
                <?php echo $banner_social_image_link; ?> 1536w,  
                <?php echo $banner_social_image_link; ?> 1568w"
            sizes="(max-width: 1920px) 100vw, 1920px" />
    </figure>
</section>