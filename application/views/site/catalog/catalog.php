<?php 
    $image_link_of_this_info = public_url('site/images/no_image.jpg');
    if($info->social_image_link !== ''){
        $image_link_of_this_info = base_url('upload/catalog_product/'.$info->social_image_link);
    }
?>
<div class="product-header" data-small-src="<?php echo $image_link_of_this_info ?>"
    style="background-image: url(<?php echo $image_link_of_this_info ?>);">
    <div class="product-header-content">
        <span class="temp-breadcrump desktop_hide">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url(); ?>">Trang Chủ</a>
                <?php if($info->parent_id !== '0'): ?>
                <?php 
                        $parent_1 = $this->catalog_model->get_info($info->parent_id); 
                        if($parent_1->parent_id !== '0'){
                            $parent_2 = $this->catalog_model->get_info($info->parent_id);
                        }
                    ?>
                <?php if(isset($parent_2)): ?><a
                    href="<?php echo base_url('product-category/'.$parent_2->alias.'-c'.$parent_2->id); ?>"><?php echo $parent_2->name ?></a><?php endif; ?>
                <?php if(isset($parent_1)): ?><a
                    href="<?php echo base_url('product-category/'.$parent_1->alias.'-c'.$parent_1->id); ?>"><?php echo $parent_1->name ?></a><?php endif; ?>
                <?php endif; ?>
                <?php echo $info->name ?>
            </nav>
        </span>
        <h1><?php echo $info->name ?></h1>
        <p>
        <p><?php echo $info->meta_desc; ?></p>
        </p>
    </div>
</div>


<div class="container">
    <ul class="products columns-4">
        <!-- catalog -->
        <?php foreach($subs_catalog_list as $row): ?>
            <?php 
                $url_of_row     = base_url('product-category/'.$row->alias.'-c'.$row->id);
                if($row->redirect_link !== ''){
                    $url_of_row = $row->redirect_link;
                }
                $image_of_row   = base_url('upload/catalog_product/'.$row->social_image_link);
                $name_of_row    = $row->name;
                $desc_of_row    = mb_strimwidth($row->meta_desc, 0, 50, "...");   
            ?>
        <li 
            class="entry product type-product post-10001 status-publish first instock product_cat-performance has-post-thumbnail shipping-taxable purchasable product-type-simple"
            id="cat90" 
            onmouseover="check(this.id)" 
            onmouseout="checkout(this.id)"> 
            <a title="<?php echo $name_of_row ?>" href="<?php echo $url_of_row ?>" class="img-anchor">
                <div class="product-thumbnail"> 
                    <img 
                        src='<?php echo $image_of_row ?>'
                        alt='<?php echo $name_of_row ?>' 
                        style='max-height:221px' />
                </div> 
                <span class="middle-cat">
                    <h3 style="font-family: Roboto;"><?php echo $name_of_row ?></h3>
                </span> 
                <span class="short_desc" style="font-family: Roboto;"><?php echo $desc_of_row ?></span>
            </a> 
            <a title="<?php echo $name_of_row ?>" href="<?php echo $url_of_row ?>" class="button product_type_simple add_to_cart_button ajax_add_to_cart" rel="nofollow" style="font-family: Roboto;display:unset;">Xem Thêm</a>
        </li>
        <?php endforeach; ?>
        <!-- end catalog -->
        <!-- product -->
        <?php foreach($product_list as $row): ?>
            <?php 
                $url_of_row     = base_url('product/'.$row->alias.'-p'.$row->id);
                $image_of_row   = base_url('upload/product/'.$row->image_link);
                $name_of_row    = $row->name;
                $desc_of_row    = mb_strimwidth($row->meta_desc, 0, 50, "...");   
            ?>
        <li 
            class="entry product type-product post-359 status-publish first instock product_cat-hifi-stereo has-post-thumbnail shipping-taxable purchasable product-type-simple"
            id="cat95" 
            onmouseover="check(this.id)" 
            onmouseout="checkout(this.id)"> 
            <a
                title="<?php echo $name_of_row ?>"
                href="<?php echo $url_of_row ?>" class="img-anchor">
                <div class="product-thumbnail"> 
                    <img 
                        src="<?php echo $image_of_row ?>"
                        alt="<?php echo $name_of_row ?>" 
                        style="max-height:221px">
                </div>
                <span class="middle-cat">
                    <h3 style="font-family:Roboto;"><?php echo $name_of_row ?></h3>
                </span> 
                <span class="short_desc" style="font-family:Roboto;"><?php echo $desc_of_row ?></span>
            </a> 
            <a 
                title="<?php echo $name_of_row ?>"
                href="<?php echo $url_of_row ?>"
                class="button product_type_simple add_to_cart_button ajax_add_to_cart" rel="nofollow"
                style="font-family:Roboto;display: unset;">Xem Thêm</a></li>
        <?php endforeach; ?>
        <!-- end product -->
    </ul>
</div>