<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php $this->load->view('admin/head'); ?>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <?php $this->load->view('admin/header'); ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php $this->load->view('admin/left'); ?>
  <?php $this->load->view($temp, $this->data); ?>

  <?php $this->load->view('admin/footer'); ?>
</body>
</html>