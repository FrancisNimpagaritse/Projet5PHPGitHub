<?php $title = "Commentaires";

//create deletion token and save it in session
$csrf = $this->httpRequest->setSession('csrf', Token::generate());

ob_start(); ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Gestion des commentaires</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Commentaires</a></li>
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
              <h3 class="card-title">Liste des commentaires</h3>
              <?php              
                if($this->httpRequest->getKeyExists('success')) {                  
                  echo '<div class="col-md-6 col-md-offset-3 alert alert-success text-center">Opération réalisée avec succès !</div>';
                }
              ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Post</th>
                    <th>Commentaire</th>
                    <th>Auteur</th>
                    <th>Date création</th>                                      
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>                
                    <?php foreach($data['comments'] as $comment) : ?>
                        <tr>
                            <td><?=$comment->id;?></td>
                            <td><?=$comment->postid;?></td>
                            <td><?=$comment->message;?></td>
                            <td><?=$comment->author;?></td>             
                            <td><?=date_format(new DateTime($comment->createdAt),"d-m-Y H:i:s");?></td>
                            <td>
                              <?=$comment->status;?>
                              <?php if ($comment->status=='attente')
                              { ?>
                              <a href="<?=Validator::escapingData($this->env['URL_PATH'])?>comment/publish/<?=$comment->id . '&token=' . $csrf;?>" class="btn btn-xs btn-warning mb-2">publier</a> 
                              <?php } else { ?>
                                <a href="<?=Validator::escapingData($this->env['URL_PATH'])?>comment/unPublish/<?=$comment->id . '&token=' . $csrf;?>" class="btn btn-xs btn-danger mb-2">retirer</a> 
                              <?php } ?>
                             </td>                              
                            <td>
                              <a href="<?=Validator::escapingData($this->env['URL_PATH'])?>comment/delete/<?=$comment->id . '&token=' . $csrf; ?>" class="btn btn-xs btn-danger mb-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr> 
                    <?php endforeach ; ?>               
                </tbody>
                <tfoot>
                <tr>
                <th>ID</th>
                    <th>Post</th>
                    <th>Commentaire</th>
                    <th>Auteur</th>
                    <th>Date création</th>                                      
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
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