<div class="single-product-wrap car-audio-wrap">
    <section class="section-product-nav" id="nav">
        <div class="ys-container">
            <nav class="product-top-nav">
                <ul class="top-nav">
                    <li> <a href="javascript:;" rel="nofollow" data-scrollto="#main"> Tổng Quan </a></li>
                    <li> <a href="javascript:;" rel="nofollow" data-scrollto="#tech"> Công Nghệ </a></li>
                    <li> <a href="javascript:;" rel="nofollow" data-scrollto="#specs"> Thông Số Kỹ Thuật </a></li>
                    <li> <a href="javascript:;" rel="nofollow" data-scrollto="#docs"> Thông tin & Tài liệu </a></li>
                    <li> <a href="javascript:;" rel="nofollow" data-scrollto="#components"> Các thành phần </a></li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="section-product-main" id="main">
        <div class="ys-container">
            <div class="breadcrumbs">
                <nav class="woocommerce-breadcrumb">
                    <a href="<?php echo base_url() ?>">Trang Chủ</a>
                    <?php if(isset($parent_catalog_of_this_info_2)): ?><a href="<?php echo base_url('product-category/'.$parent_catalog_of_this_info_2->alias.'-c'.$parent_catalog_of_this_info_2->id); ?>"><?php echo $parent_catalog_of_this_info_2->name ?></a><?php endif; ?>
                    <?php if(isset($parent_catalog_of_this_info_1)): ?><a href="<?php echo base_url('product-category/'.$parent_catalog_of_this_info_1->alias.'-c'.$parent_catalog_of_this_info_1->id); ?>"><?php echo $parent_catalog_of_this_info_1->name ?></a><?php endif; ?>
                    <?php if(isset($catalog_of_this_info)): ?><a href="<?php echo base_url('product-category/'.$catalog_of_this_info->alias.'-c'.$catalog_of_this_info->id); ?>"><?php echo $catalog_of_this_info->name ?></a><?php endif; ?>
                    <?php echo $info->name ?>
                </nav>
            </div>
            <h1 class="section-title"><?php echo $info->name ?></h1>
            <div class="cols">
                <?php $this->load->view('site/product/left'); ?>
                
                <div class="col-content">
                    <div class="entry-content">
                        <p><span style="font-weight: 400;font-family:Roboto !important;"><?php echo $info->content; ?></span></p>
                        <p>&nbsp;</p>
                        <script language='javascript' type='text/javascript'>
                            function getWR360PopupSkin() {
                                return 'light_clean';
                            }
                        </script>
                    </div>
                    <?php $this->load->view('site/product/share_social'); ?>
                    <?php $this->load->view('site/product/cart'); ?>
                </div>
                <?php $this->load->view('site/product/product_image'); ?>
            </div>
        </div>
    </section>
    <?php $this->load->view('site/product/technology');?>
    <?php $this->load->view('site/product/specification'); ?>
    <?php $this->load->view('site/product/documentary'); ?>
    <?php $this->load->view('site/product/component_list'); ?>
    <?php $this->load->view('site/product/banner_social_image_link'); ?>
</div>