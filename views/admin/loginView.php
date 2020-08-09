<?php $title = "Login" ;?>

<?php ob_start(); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Log</b>in</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Entrez vos identifiants</p>

      <form action="<?=URL_PATH;?>authentication/login" method="post">
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control <?=(!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php //if (isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } else { echo $data['email'];} ?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <span class="invalid-feedback"><?=$data['email_error'];?></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control <?=(!empty($data['password_error'])) ? 'is-invalid' : '';?>" value="<?php // if (isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } else { echo $data['password'];} ?>" placeholder="Mot de passe">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?=$data['password_error'];?></span> 
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
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
            <a href="<?=URL_PATH;?>user/register" class="btn btn-danger btn-block">Pas inscrit? S'inscrire
            </a>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      <!--  <p>- OU -</p>
        
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Connexion avec Facebook
        </a>
      -->  
        
      </div>
      <!-- /.social-auth-links -->

      <div class="row">
        <div class="col-6">
          <a href="<?=URL_PATH;?>authentication/forgotPassword" class="btn btn-light mt-2">Password oublié</a>
        </div>
        <div class="col-6">
          <a href="<?=URL_PATH;?>" class="btn btn-light mt-2 text-left"><i class="fa fa-backward"></i>Retour blog</a>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php $content = ob_get_clean(); ?>

<?php require_once 'login_template.php'; ?>