<?php $title = "Dashboard"; ?>

<?php ob_start(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$posts->nbPosts;?></h3>

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>posts/list" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$comments->nbComments;?><sup style="font-size: 20px"></sup></h3>

                <p>Commentaires</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>comment/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$users->nbUsers;?></h3>

                <p>Utilisateurs inscrits</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>user/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$publishedPosts->nbPosts;?></h3>

                <p>Posts publiés</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>posts/list" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$approvedComments->nbComments;?><sup style="font-size: 20px"></sup></h3>

                <p>Commentaires publiés</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>comment/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$users->nbUsers;?></h3>

                <p>Utilisateurs actifs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>user/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$unpublishedPosts->nbPosts;?></h3>

                <p>Posts en attente</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>posts/list" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$unapprovedComments->nbComments;?><sup style="font-size: 20px"></sup></h3>

                <p>Commentaires en attente</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>comment/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>

                <p>Utilisateurs non validés</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=$_ENV['URL_PATH']?>user/index" class="small-box-footer">voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>         
        </div>        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $content = ob_get_clean(); ?>

<?php require_once 'admin_template.php'; ?>