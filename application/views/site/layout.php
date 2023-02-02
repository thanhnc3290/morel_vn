<!doctype html>
<html lang="en-US">
<?php $this->load->view('site/head'); ?>

<body class="home page-template-default page page-id-5 wp-embed-responsive theme-morel woocommerce-no-js mega-menu-menu-1 singular image-filters-enabled" style="font-family:Roboto !important;">
    <?php echo $site_info->script_verified_site_in_body; ?>
    <?php $this->load->view('site/header'); ?>
    <?php $this->load->view($temp, $this->data); ?>
    <?php $this->load->view('site/footer'); ?>
    <?php $this->load->view('site/scripts'); ?>
</body>

</html>