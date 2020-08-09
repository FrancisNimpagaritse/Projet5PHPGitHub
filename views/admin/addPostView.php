<?php $title = "Ajouter un blog post"; ?>

<?php ob_start(); ?>

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
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter un post blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=htmlspecialchars(URL_PATH);?>posts/add" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">title <sup>*</sup></label>
                    <input type="text" id="title" name="title" class="form-control <?=(!empty($data['title_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title'] ?>" placeholder="Titre">
                    <span class="invalid-feedback"><?=$data['title_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="category">catégorie</label>                    
                      <select name="category" id="category">
                        <option value="C#/.Net">C#/.Net</option>
                        <option value="BI">BI</option>
                        <option value="PHP">PHP</option>
                        <option value="Symfony">Sympfony</option>
                      </select>                    
                    <span class="invalid-feedback"><?=$data['lastname_error']; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="chapo">chapô <sup>*</sup></label>
                    <input type="text" id="chapo" name="chapo" class="form-control <?=(!empty($data['chapo_error'])) ? 'is-invalid' : '';?>" value="<?=$data['chapo'];?>" placeholder="Chapô">            
                    <span class="invalid-feedback"><?=$data['chapo_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="content">contenu <sup>*</sup></label>
                    <textarea id="content" name="content" rows=4 class="form-control <?=(!empty($data['content_error'])) ? 'is-invalid' : '';?>" value="<?=$data['content'];?>" placeholder="Contenu"></textarea>
                    <span class="invalid-feedback"><?=$data['content_error'];?></span>
                  </div>
                  <div class="form-group">
                    <label for="postImage">image</label>
                    <input type="text" id="postImage" name="postImage" class="form-control <?=(!empty($data['postImage_error'])) ? 'is-invalid' : '';?>" value="<?=$data['postImage'];?>" placeholder="Image">
                    <span class="invalid-feedback"><?=$data['postImage_error'];?></span>              
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