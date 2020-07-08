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
  <title><?=WEBSITENAME; ?> | commentaires</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=URL_PATH;?>public/admin/dist/css/adminlte.min.css">
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
                              <a href="<?=URL_PATH;?>comment/publish/<?=$comment->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-warning mb-2">publier</a> 
                              <?php } else { ?>
                                <a href="<?=URL_PATH;?>comment/unPublish/<?=$comment->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-danger mb-2">retirer</a> 
                              <?php } ?>
                             </td>                              
                            <td>
                              <a href="<?=URL_PATH;?>comment/delete/<?=$comment->id . '&token=' . $_SESSION['user']['token'];?>" class="btn btn-xs btn-danger mb-2"><i class="far fa-trash-alt"></i></a>
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
  
  <?php require_once('themeparts/footerAdmin.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=URL_PATH; ?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=URL_PATH; ?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=URL_PATH; ?>public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=URL_PATH; ?>public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=URL_PATH; ?>public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=URL_PATH; ?>public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=URL_PATH; ?>public/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=URL_PATH; ?>public/admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
