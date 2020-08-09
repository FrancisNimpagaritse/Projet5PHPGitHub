<?php $title = "Inscription" ;?>

<?php ob_start(); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Inscripti</b>on</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Veuillez remplir le formulaire pour vous inscrire</p>

      <form action="<?=URL_PATH ?>user/register" method="post">
        <div class="input-group mb-3">
          <input type="text" id="firstname" name="firstname" class="form-control <?=(!empty($data['firstname_error'])) ? 'is-invalid' : '';?>" value="<?=$data['firstname'];?>" placeholder="Prénom">
            <div class="input-group-append">
              <div class="input-group-text">                
              </div>
            </div>
            <span class="invalid-feedback"><?=$data['firstname_error'];?></span>
        </div>
        <div class="input-group mb-3">
          <input type="text" id="lastname" name="lastname" class="form-control <?=(!empty($data['lastname_error'])) ? 'is-invalid' : '';?>" value="<?=$data['lastname'];?>" placeholder="Nom">
            <div class="input-group-append">
              <div class="input-group-text">                
              </div>
            </div>
            <span class="invalid-feedback"><?=$data['lastname_error']; ?></span>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control <?=(!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?=$data['email'];?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <span class="invalid-feedback"><?=$data['email_error'];?></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control <?=(!empty($data['password_error'])) ? 'is-invalid' : '';?>" value="<?=$data['password'];?>" placeholder="Mot de passe">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?=$data['password_error'];?></span> 
        </div>
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" name="confirm_password" class="form-control <?=(!empty($data['confirm_password_error'])) ? 'is-invalid' : '';?>" value="<?=$data['confirm_password'];?>" placeholder="Confirmer mot de passe">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          <span class="invalid-feedback"><?=$data['password_error'];?></span> 
        </div>

        <div class="row">
          <div class="col-8">            
            <a href="<?=URL_PATH;?>authentication/login" class="btn btn-success">Déjà inscrit? Connexion
            </a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">M'inscrire</button>
          </div>
          
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