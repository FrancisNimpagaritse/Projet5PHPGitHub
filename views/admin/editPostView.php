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
  <title><?php echo WEBSITENAME; ?> | Modifier post</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=URL_PATH ;?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=URL_PATH ;?>public/admin/dist/css/adminlte.min.css">
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
            <h1>Gestion posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title">Modifier un post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=URL_PATH;?>posts/edit/<?=$data['id']; ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">title <sup>*</sup></label>
                    <input type="text" id="title" name="title" class="form-control <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'] ?>" placeholder="Titre">
                    <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="category">catégorie</label>                    
                      <select name="category" id="category">
                        <option value="<?=$data['category']?>"><?=$data['category']?></option>
                        <option value="C#/.Net">C#/.Net</option>
                        <option value="BI">BI</option>
                        <option value="PHP">PHP</option>
                        <option value="Symfony">Sympfony</option>                  
                      </select>                    
                    <span class="invalid-feedback"><?=$data['category_error']; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="chapo">chapô <sup>*</sup></label>
                    <input type="text" id="chapo" name="chapo" class="form-control <?=(!empty($data['chapo_error'])) ? 'is-invalid' : ''; ?>" value="<?=$data['chapo'];?>" placeholder="Chapô">            
                    <span class="invalid-feedback"><?=$data['chapo_error']; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="content">contenu <sup>*</sup></label>
                    <textarea id="content" name="content" rows=4 class="form-control <?=(!empty($data['content_error'])) ? 'is-invalid' : ''; ?>" placeholder="Contenu"><?=$data['content'];?></textarea>
                    <span class="invalid-feedback"><?=$data['content_error']; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="postImage">image</label>
                    <input type="text" id="postImage" name="postImage" class="form-control <?=(!empty($data['postImage_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['postImage'] ?>" placeholder="Image">
                    <span class="invalid-feedback"><?=$data['postImage_error']; ?></span>              
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