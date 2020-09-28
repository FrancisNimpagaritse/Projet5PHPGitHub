<?php require_once('themeparts/headerAdmin.php'); ?>

<body class="hold-transition login-page">

<?=$content;?>

<!-- jQuery -->
<script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/admin/dist/js/adminlte.min.js"></script>

</body>
</html>
