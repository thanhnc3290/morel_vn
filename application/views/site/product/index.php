<div id="content" class="site-content">
    <div 
        class="product-header-shop"
        style="background-image:url(<?php echo public_url('site/images') ?>/shop1.jpg.webp);">
        <div class="product-header-content"> <span class="temp-breadcrump desktop_hide">
                <nav class="woocommerce-breadcrumb"><a href="<?php echo base_url() ?>">Trang Chủ</a>Cửa Hàng</nav>
            </span>
            <h1>Sản Phẩm của Morel</h1>
            <p>Hệ thống nguồn điểm hai chiều sub/sat từng đoạt giải thưởng nổi tiếng về khả năng tái tạo âm thanh chất lượng cao
                 cùng với vẻ ngoài hiện đại, riêng biệt mang đến nhiều cách lắp đặt dễ dàng</p>
            <div class="countrydropdown-wrapper">
                <div class="custom-select" style="width:330px;">
                    <form action="" method="post">
                        <div class="select-selected">United States (US)</div>
                        <style>
                        .countrydropdown-wrapper form .select-selected {
                            background-image: none;
                            padding-right: 0;
                            cursor: default;
                        }
                        </style>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="top-text">Bạn có thể chọn một danh mục hoặc cuộn xuống</p>
        <header class="woocommerce-products-header">
            <div class="woocommerce-notices-wrapper"></div>
            <p class="woocommerce-result-count"></p>
            <ul class="woocommerce-categories">
                <?php foreach($catalog_list as $row): ?>
                <li class="woocommerce-product-category-page"><a href="#<?php echo $row->alias ?>" class="lifestyle"><?php echo $row->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </header>
        <?php foreach($catalog_list as $row): ?>
            <?php 
                $product_list = array();

                $input_product_of_row = array();
                $input_product_of_row['where'] = array('status' => '0','catalog_id' => $row->id);
                $input_product_of_row['order'] = array('id','desc');
                $this->db->select('id, name, alias, image_link, meta_desc, option_price_1');
                $product_list_of_row  = $this->product_model->get_list($input_product_of_row);
                foreach($product_list_of_row as $product_of_row){
                    $product_list[] = $product_of_row;
                }

                foreach($row->subs as $subs){
                    $input_product_of_subs = array();
                    $input_product_of_subs['where'] = array('status' => '0','catalog_id' => $subs->id);
                    $input_product_of_subs['order'] = array('id','desc');
                    $this->db->select('id, name, alias, image_link, meta_desc, option_price_1');
                    $product_list_of_subs  = $this->product_model->get_list($input_product_of_subs);
                    foreach($product_list_of_subs as $product_of_subs){
                        $product_list[] = $product_of_subs;
                    }

                    foreach($subs->subss as $subss){
                        $input_product_of_subss = array();
                        $input_product_of_subss['where'] = array('status' => '0','catalog_id' => $subss->id);
                        $input_product_of_subss['order'] = array('id','desc');
                        $this->db->select('id, name, alias, image_link, meta_desc, option_price_1');
                        $product_list_of_subss  = $this->product_model->get_list($input_product_of_subss);
                        foreach($product_list_of_subss as $product_of_subss){
                            $product_list[] = $product_of_subss;
                        }
                    }
                }
            ?>
            
        <ul class="products columns-4 shop-page custom_shop">
            <h2 id="<?php echo $row->alias ?>"> <?php echo $row->name ?></h2>
            <?php foreach($product_list as $product): ?>
                <?php 
                    $product_id     = $product->id;
                    $product_alias  = $product->alias;
                    $product_name   = $product->name;
                    $product_url    = base_url('product/'.$product->alias.'-p'.$product->id);
                    $product_desc   = mb_strimwidth($product->meta_desc,'0','70','...');
                    $product_image_link = public_url('site/images/no_image.jpg');
                    if($product->image_link !== ''){
                        $product_image_link = base_url('upload/product/'.$product->image_link);
                    }
                    $product_price_vnd = $product->option_price_1 * $site_info->currency_vnd;
                ?>
            <li 
                class="entry product type-product post-5947 status-publish first instock product_cat-lifestyle has-post-thumbnail shipping-taxable purchasable product-type-variable"
                id="<?php echo $product_alias.'-'.$product_id ?>" onmouseover="check(this.id)" onmouseout="checkout(this.id)"> 
                <a
                    href="<?php echo $product_url; ?>"
                    title="<?php echo $product_name ?>" class="img-anchor">
                    <div class="product-thumbnail"> 
                        <img width="170" height="170"
                            src="<?php echo $product_image_link ?>"
                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="<?php echo $product_name ?>" decoding="async" loading="lazy"
                            srcset="
                                <?php echo $product_image_link ?> 170w,  
                                <?php echo $product_image_link ?> 100w,  
                                <?php echo $product_image_link ?> 400w,  
                                <?php echo $product_image_link ?> 300w,  
                                <?php echo $product_image_link ?> 150w,  
                                <?php echo $product_image_link ?> 750w"
                            sizes="(max-width: 34.9rem) calc(100vw - 2rem), (max-width: 53rem) calc(8 * (100vw / 12)), (min-width: 53rem) calc(6 * (100vw / 12)), 100vw" />
                    </div> <span class="middle">
                        <h3><?php echo $product_name ?></h3> 
                        <span class="price"> 
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php if($product_price_vnd > '0'): ?>
                                    <?php echo number_format($product_price_vnd); ?><span class="woocommerce-Price-currencySymbol"> VND</span>
                                    <?php endif; ?>
                                </bdi>
                            </span>
                        </span>
                    </span> 
                    <span class="short_desc"><?php echo $product_desc ?></span>
                </a> 
                
                <a href="<?php echo $product_url ?>" class="button product_type_simple" rel="nofollow" style="margin: 0.5rem 2.5rem;display:block">Mua</a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
        </main>
    </div>
</div>