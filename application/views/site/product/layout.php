<!doctype html>
<html lang="en-US">
    <?php $this->load->view('site/product/head_product'); ?>
    <body class="product-template-default single single-product postid-2240 wp-embed-responsive theme-morel woocommerce woocommerce-page woocommerce-no-js mega-menu-menu-1 singular image-filters-enabled">
        <?php echo $site_info->script_verified_site_in_body; ?>
        <?php $this->load->view('site/header'); ?>
        <?php $this->load->view($temp, $this->data); ?>
        <?php $this->load->view('site/footer'); ?>
        <?php $this->load->view('site/scripts'); ?>
    </body>
</html>