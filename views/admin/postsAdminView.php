<?php $title = "Liste des blog posts"; ?>

<?php ob_start(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Gestion des posts</h4>
            
                <?php
                
                if (isset($message)) {
                  echo '<div class="col-md-6 col-md-offset-3 alert alert-success text-center">' . $message . '</div>';
                }
                ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Posts</a></li>
              <li class="breadcrumb-item active">liste</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des posts</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Chapô</th>
                    <th>Catégorie</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Dernière modification</th>                                      
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                
                    <?php foreach($data['posts'] as $post) : ?>
                        <tr>
                            <td><?=$post->id;?></td>
                            <td><?=$post->title;?></td>
                            <td><?=$post->chapo;?></td>
                            <td><?=$post->category;?></td>
                            <td><?=$post->content;?></td>
                            <td><?=$post->authorId;?></td>                                                        
                            <td><?=date_format(new DateTime($post->updatedAt),"d-m-Y H:i:s");?></td>
                            <td>
                              <?=$post->status;?>
                              <?php if ($post->status=='attente')
                              { ?>
                              <a href="<?=URL_PATH;?>posts/publish/<?=$post->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-warning mb-2">publier</a> 
                              <?php } else { ?>
                                <a href="<?=URL_PATH;?>posts/unPublish/<?=$post->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-danger mb-2">retirer</a> 
                              <?php } ?>
                             </td>                              
                            <td>
                              <a href="<?=URL_PATH;?>posts/edit/<?=$post->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-primary mb-2"><i class="fas fa-pencil-alt"></i></a> 
                              <a href="<?=URL_PATH;?>posts/delete/<?=$post->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-danger mb-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr> 
                    <?php endforeach ; ?>               
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Chapô</th>
                  <th>Catégorie</th>
                  <th>Contenu</th>
                  <th>Auteur</th>
                  <th>Dernière modification</th>                                      
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </p>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php $content = ob_get_clean(); ?>

<?php require_once 'admin_template.php'; ?>
