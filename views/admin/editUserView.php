<?php

if(!isset($_SESSION['user_id']))
  {
    header('Location: '. URL_PATH.'authentication/login');    
      exit();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo WEBSITENAME; ?> | Modifier</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL_PATH ;?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL_PATH ;?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require_once('themeparts/topmenuAdmin.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once('themeparts/sidebarAdmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modifier administrateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=URL_PATH;?>user/edit/<?=$data['id']. '&token=' . $_SESSION['user']['token'];?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="firstname">Prénom <sup>*</sup></label>
                    <input type="text" id="firstname" name="firstname" class="form-control <?=(!empty($data['firstname_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['firstname'] ?>" placeholder="Prénom">
                    <span class="invalid-feedback"><?=$data['firstname_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="lastname">Nom <sup>*</sup></label>
                    <input type="text" id="lastname" name="lastname" class="form-control <?=(!empty($data['lastname_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['lastname'] ?>" placeholder="Nom">
                    <span class="invalid-feedback"><?=$data['lastname_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="email">Adresse email <sup>*</sup></label>
                    <input type="email" id="email" name="email" class="form-control <?=(!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['email'] ?>" placeholder="Adresse email">            
                    <span class="invalid-feedback"><?=$data['email_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe <sup>*</sup></label>
                    <input type="password" id="password" name="password" class="form-control <?=(!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['password'] ?>" placeholder="Mot de passe">
                    <span class="invalid-feedback"><?=$data['password_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirmer mot de passe <sup>*</sup></label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control <?=(!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['confirm_password'] ?>" placeholder="Confirmer mot de passe">
                    <span class="invalid-feedback"><?=$data['confirm_password_error']; ?></span>              
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form>
            </div>            

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
<script src="<?php echo URL_PATH ;?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL_PATH ;?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo URL_PATH ;?>public/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL_PATH ;?>public/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL_PATH ;?>public/admin/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>