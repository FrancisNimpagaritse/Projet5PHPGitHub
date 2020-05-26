
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Log</b>in</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Entrez vos identifiants</p>

      <form action="<?php echo URL_PATH ?>user/login" method="post">
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'] ?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password'] ?>" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?php echo $data['password_error']; ?></span> 
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se souvenir de Moi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Connecter</button>
          </div>
          
          <!-- /.col -->
          <div class="col">
            <p></p>
            <a href="<?php echo URL_PATH; ?>user/register" class="btn btn-danger btn-block">Pas inscrit? S'inscrire
            </a>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OU -</p>
        
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Connexion avec Facebook
        </a>
        
        
      </div>
      <!-- /.social-auth-links -->

      <div class="row">
        <div class="col-6">
          <a href="<?php echo URL_PATH ?>user/forgotpassword" class="btn btn-light mt-2">Password oublié</a>
        </div>
        <div class="col-6">
          <a href="<?php echo URL_PATH; ?>" class="btn btn-light mt-2 text-left"><i class="fa fa-backward"></i>Retour blog</a>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo URL_PATH; ?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL_PATH; ?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL_PATH; ?>public/admin/dist/js/adminlte.min.js"></script>

</body>
</html>
