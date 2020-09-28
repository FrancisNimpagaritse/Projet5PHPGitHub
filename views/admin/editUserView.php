<?php $title = "Modifier un utilisateur"; ?>

<?php ob_start(); ?>

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
              <li class="breadcrumb-item"><a href="#">Utilisateurs</a></li>
              <li class="breadcrumb-item active">modifier</li>
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
              <form role="form" action="<?=Validator::escapingData($this->env['URL_PATH'])?>user/edit/<?=Validator::escapingData($data['id']). '&token=' . $_SESSION['user']['token'];?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="firstname">Prénom <sup>*</sup></label>
                    <input type="text" id="firstname" name="firstname" class="form-control <?=(!empty($data['firstname_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['firstname']);?>" placeholder="Prénom">
                    <span class="invalid-feedback"><?=Validator::escapingData($data['firstname_error']);?></span>
                  </div>
                  <div class="form-group">
                    <label for="lastname">Nom <sup>*</sup></label>
                    <input type="text" id="lastname" name="lastname" class="form-control <?=(!empty($data['lastname_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['lastname']);?>" placeholder="Nom">
                    <span class="invalid-feedback"><?=Validator::escapingData($data['lastname_error']);?></span>
                  </div>
                  <div class="form-group">
                    <label for="email">Adresse email <sup>*</sup></label>
                    <input type="email" id="email" name="email" class="form-control <?=(!empty($data['email_error']) || !empty($data['email_duplic'])) ? 'is-invalid' : '';?>" value="<?=Validator::escapingData($data['email']);?>" placeholder="Email">
                    <span class="invalid-feedback"><?=Validator::escapingData($data['email_error']);?></span>
                    <span class="invalid-feedback"><?=Validator::escapingData($data['email_duplic']);?></span>
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe <sup>*</sup></label>
                    <input type="password" id="password" name="password" class="form-control <?=(!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['password']) ?? '';?>" placeholder="Mot de passe">
                    <span class="invalid-feedback"><?=$data['password_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirmer mot de passe <sup>*</sup></label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control <?=(!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?=Validator::escapingData($data['confirm_password']) ?? ''; ?>" placeholder="Confirmer mot de passe">
                    <span class="invalid-feedback"><?=Validator::escapingData($data['confirm_password_error']);?></span>              
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
  
<?php $content = ob_get_clean(); ?>

<?php require_once 'admin_template.php'; ?>