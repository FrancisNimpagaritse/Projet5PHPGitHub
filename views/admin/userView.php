<?php $title = "Utilisateurs inscrits"; ?>

<?php ob_start(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Gestion des utilisateurs</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Utilisateurs</a></li>
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
              <h3 class="card-title">Utilisateurs inscrits</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Profil</th>                  
                    <th>Demande de mot de passe</th>
                    <th>Dernière modification</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                
                    <?php foreach($data['users'] as $user) : ?>
                        <tr>
                            <td><?=$user->getId();?></td>
                            <td><?=$user->getFirstname();?></td>
                            <td><?=$user->getLastname();?></td>
                            <td><?=$user->getEmail();?></td>
                            <td><?=$user->getProfile();?></td>
                            <td><?=$user->getNewpwd();?></td>
                            <td><?=date_format(new DateTime($user->getUpdatedAt()),"d-m-Y H:i:s");?></td>
                            <td>
                            <a href="<?=URL_PATH; ?>user/edit/<?=$user->getId() . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-primary mb-2"><i class="fas fa-pencil-alt"></i></a> 
                            <a href="<?=URL_PATH; ?>user/delete/<?=$user->getId() . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-danger mb-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Prénom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Profil</th>
                  <th>Demande de mot de passe</th>                  
                  <th>Dernière modification</th>
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