    <div id="content" class="site-content">
        <div class="single-product-header" style="background-image:url(<?php echo public_url('site/images') ?>/product-min.jpg.webp)">
            <div class="container">
                <div class="morelproduct_detail">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <nav class="woocommerce-breadcrumb">
                                <a href="<?php echo base_url() ?>">Trang Chủ</a>
                                <?php if(isset($parent_catalog_of_this_info_2)): ?><a href="<?php echo base_url('product-category/'.$parent_catalog_of_this_info_2->alias.'-c'.$parent_catalog_of_this_info_2->id); ?>"><?php echo $parent_catalog_of_this_info_2->name ?></a><?php endif; ?>
                                <?php if(isset($parent_catalog_of_this_info_1)): ?><a href="<?php echo base_url('product-category/'.$parent_catalog_of_this_info_1->alias.'-c'.$parent_catalog_of_this_info_1->id); ?>"><?php echo $parent_catalog_of_this_info_1->name ?></a><?php endif; ?>
                                <?php if(isset($catalog_of_this_info)): ?><a href="<?php echo base_url('product-category/'.$catalog_of_this_info->alias.'-c'.$catalog_of_this_info->id); ?>"><?php echo $catalog_of_this_info->name ?></a><?php endif; ?>
                                <?php echo $info->name ?>
                            </nav>
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="desktop_hide"> 
                                <span class="custom-title"><?php echo $info->name; ?></span> 
                                <span class="custom-sku"></span>
                            </div>
                            <div 
                                id="product-2409"
                                class="entry product type-product post-2409 status-publish first instock product_cat-hifi-stereo has-post-thumbnail shipping-taxable product-type-simple">
                                <?php $this->load->view('site/product/product_image_2'); ?>
                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title"><?php echo $info->name; ?></h1>
                                    <span class='product-extrainfo'></span>
                                    <div class="woocommerce-product-details__short-description">
                                        <p>Bước vào thế giới Morel – nghe tái tạo âm nhạc chính xác và cảm nhận âm thanh của một nhạc cụ và giọng nói sống động</p>
                                    </div>
                                    <ul class="product-detail-icons" style="display:none;">
                                        <li> <span class="logo_image"><img src=""></span> <span class="logo_name"></span></li>
                                        <li> <span class="logo_image"><img src=""></span> <span class="logo_name"></span></li>
                                        <li> <span class="logo_image"><img src=""></span> <span class="logo_name"></span></li>
                                        <li> <span class="logo_image"><img src=""></span> <span class="logo_name"></span></li>
                                        <li> <span class="logo_image"><img src=""></span> <span class="logo_name"></span></li>
                                    </ul>
                                </div>
                                <div id="accordion">
                                    <h3 style="font-family:Roboto !important;">Thông tin sản phẩm<span class="plusminus"></span></h3>
                                    <div>
                                        <div class="custom-content">
                                            <div class="custom-content-left" style="font-family:Roboto !important;">Nội Dung</div>
                                            <div class="custom-content-right philosophy"> 
                                                <span class="custom-content-data" style="font-family:Roboto !important;"><?php echo $info->content ?></span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <h3 
                                        class="ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active" 
                                        role="tab" 
                                        id="ui-id-3" 
                                        aria-controls="ui-id-4" 
                                        aria-selected="true" 
                                        aria-expanded="true" 
                                        tabindex="0" style="font-family:Roboto !important;">
                                        <span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>Thông Số Kỹ Thuật
                                    </h3>
                                    <div 
                                        class="ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active" 
                                        style="" id="ui-id-4" aria-labelledby="ui-id-3" 
                                        role="tabpanel" aria-hidden="false">
                                        <div class="table-responsive specifications_table">
                                            <?php echo $info->specification; ?>
                                        </div>
                                    </div>
                                    <h3 style="font-family:Roboto !important;">Thông Tin & Tài Liệu<span class="plusminus"></span></h3>
                                    <div>
                                        <ul class="product-review-section download-section">
                                        <?php 
                                            $documentary_list_of_this_info = array();
                                            if(is_array(json_decode($info->documentary))){
                                                $documentary_list_of_this_info = json_decode($info->documentary);
                                            }
                                        ?>
                                        <?php foreach($documentary_list_of_this_info as $row): ?>
                                            <li class="download_data_1"> 
                                                <span class="review_headline"><?php echo str_replace(array('_','-'),' ',$row) ?></span>
                                                <span class="review_pdf">
                                                    <a href="<?php echo base_url('upload/product/'.$row) ?>" target="_blank"></a>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery("p.price").wrapInner("<div class='custom-wrapper-prices'></div>");
        let isRangePriced = jQuery(".woocommerce-Price-amount").length === 2;
    </script>