<!doctype html>
<html lang="en-US">

<?php $this->load->view('site/product/head_product'); ?>

<body class="product-template-default single single-product postid-2409 wp-embed-responsive theme-morel woocommerce woocommerce-page woocommerce-no-js mega-menu-menu-1 singular image-filters-enabled">
    <?php echo $site_info->script_verified_site_in_body; ?>
    <?php $this->load->view('site/header'); ?>
    <?php $this->load->view($temp, $this->data); ?>
    
    <?php $this->load->view('site/footer'); ?>

    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/jquery.zoom.min.js' id='zoom-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/jquery.flexslider.min.js' id='flexslider-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/photoswipe.min.js' id='photoswipe-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/photoswipe-ui-default.min.js' id='photoswipe-ui-default-js'></script>
    <script type='text/javascript' id='wc-single-product-js-extra'>
        var wc_single_product_params = {
            "i18n_required_rating_text": "Please select a rating",
            "review_rating_required": "yes",
            "flexslider": {
                "rtl": false,
                "animation": "slide",
                "smoothHeight": true,
                "directionNav": false,
                "controlNav": "thumbnails",
                "slideshow": false,
                "animationSpeed": 500,
                "animationLoop": false,
                "allowOneSlide": false
            },
            "zoom_enabled": "1",
            "zoom_options": [],
            "photoswipe_enabled": "1",
            "photoswipe_options": {
                "shareEl": false,
                "closeOnScroll": false,
                "history": false,
                "hideAnimationDuration": 0,
                "showAnimationDuration": 0
            },
            "flexslider_enabled": "1"
        };
    </script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/single-product.min.js' id='wc-single-product-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/jquery.blockUI.min.js' id='jquery-blockui-js'></script>
    
    <?php $this->load->view('site/scripts'); ?>
</body>

</html><!-- Cache Enabler by KeyCDN @ Sun, 05 Feb 2023 10:52:38 GMT (https-index-webp.html.gz) -->