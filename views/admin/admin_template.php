<?php

  if(!isset($_SESSION['user_id']) && !isset($_COOKIE['user_firstname'])) {
    header('Location: '. URL_PATH.'authentication/login');
      exit();
  }
  
  $_SESSION['user_firstname'] = (isset($_COOKIE['user_firstname']) && !empty($_COOKIE['user_firstname'])) ? $_COOKIE['user_firstname'] : $_SESSION['user_firstname'];
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=WEBSITENAME .' - ' . $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php require_once('themeparts/topmenuAdmin.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once('themeparts/sidebarAdmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <?=$content;?>
  <!-- /.content-wrapper -->
 
  <?php require_once('themeparts/footerAdmin.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=URL_PATH;?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=URL_PATH;?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=URL_PATH;?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=URL_PATH;?>public/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=URL_PATH;?>public/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=URL_PATH;?>public/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=URL_PATH;?>public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=URL_PATH;?>public/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=URL_PATH;?>public/admin/plugins/moment/moment.min.js"></script>
<script src="<?=URL_PATH;?>public/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=URL_PATH;?>public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=URL_PATH;?>public/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=URL_PATH;?>public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=URL_PATH;?>public/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=URL_PATH;?>public/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=URL_PATH;?>public/admin/dist/js/demo.js"></script>
</body>
</html>
