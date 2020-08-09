<!DOCTYPE html>
<?php $title = "Demande mot de passe" ;?>

<?php ob_start(); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Mon</b>blog</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Vous avez oublié votre mot de passe? Demandez un autre.</p>

      <form action="<?=URL_PATH;?>authentication/requestPassword" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Demande de nouveau mot de passe</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?=URL_PATH;?>authentication/login">Se Connecter</a>
      </p>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php $content = ob_get_clean(); ?>

<?php require_once 'login_template.php'; ?>
