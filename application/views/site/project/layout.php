<!doctype html>
<html lang="en-US">
    <?php $this->load->view('site/head'); ?>

<body class="page-template page-template-template-projects page-template-template-projects-php page page-id-16 wp-embed-responsive theme-morel woocommerce-no-js mega-menu-menu-1 singular image-filters-enabled">
    <?php echo $site_info->script_verified_site_in_body; ?>
    <style>
        .side-icons a.cart-anchor {
            display: none;
        }

        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-always-selected {
            display: none;
        }

        .side-icons {
            left: auto;
            right: 0;
        }
    </style>
    <?php $this->load->view('site/header'); ?>
    <?php $this->load->view($temp, $this->data); ?>
    <?php $this->load->view('site/footer'); ?>
    <?php $this->load->view('site/scripts'); ?>
</body>

</html><!-- Cache Enabler by KeyCDN @ Tue, 07 Feb 2023 11:35:25 GMT (https-index-mobile-webp.html) -->