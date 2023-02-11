<!doctype html>
<html lang="en-US">
    <?php $this->load->view('site/head'); ?>

<body class="archive post-type-archive post-type-archive-product wp-embed-responsive theme-morel woocommerce-shop woocommerce woocommerce-page woocommerce-no-js mega-menu-menu-1 hfeed image-filters-enabled">
    <?php echo $site_info->script_verified_site_in_body; ?>
    <?php $this->load->view('site/header'); ?>
    <?php $this->load->view($temp, $this->data); ?>
    <?php $this->load->view('site/footer'); ?>
    <?php $this->load->view('site/scripts'); ?>
</body>

</html><!-- Cache Enabler by KeyCDN @ Fri, 10 Feb 2023 20:12:03 GMT (https-index-webp.html) -->