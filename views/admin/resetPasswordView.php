<?php $title = "Changer mot de passe" ;?>

<?php ob_start(); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Réinitialiser</b>Mot de passe</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Veuillez remplir le formulaire pour réinitialiser votre mot de passe</p>

      <form action="<?=URL_PATH;?>authentication/resetPassword" method="post">        
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control <?=(!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['email']);?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <span class="invalid-feedback"><?=Validator::escapingData($data['email_error']);?></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control <?=(!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['password'] ?>" placeholder="Mot de passe">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?=($data['password_error']);?></span> 
        </div>
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" name="confirm_password" class="form-control <?=(!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['confirm_password']);?>" placeholder="Confirmer mot de passe">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?=Validator::escapingData($data['password_error']);?></span> 
        </div>
        <div><input type="hidden" name="token" value="<?=$token?>"></div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-success btn-block">Valider</button>
          </div>
          <!-- /.col -->
          
          
          <!-- /.col -->
          
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OU -</p>
        
                
        
      </div>
      <!-- /.social-auth-links -->

      <div class="row">        
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