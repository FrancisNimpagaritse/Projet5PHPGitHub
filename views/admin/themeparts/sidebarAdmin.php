<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?=Validator::escapingData($_ENV['URL_PATH'])?>views/admin/myImage/softwaredev1.png"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">franimpa.fr</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=Validator::escapingData($_ENV['URL_PATH'])?>views/admin/myImage/francis-01.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['user_firstname'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->         
          <li class="nav-item">
            <a href="<?=Validator::escapingData($_ENV['URL_PATH'])?>homeAdmin" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accueil                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Utilisateurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=Validator::escapingData($_ENV['URL_PATH'])?>user/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des utilisateurs</p>
                </a>
              </li>
            </ul>
          </li>          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=Validator::escapingData($_ENV['URL_PATH'])?>posts/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=Validator::escapingData($_ENV['URL_PATH'])?>posts/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Créer un post</p>
                </a>
              </li>               
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-podcast"></i>
              <p>
              Commentaires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=Validator::escapingData($_ENV['URL_PATH'])?>comment/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste commentaires</p>
                </a>
              </li> 
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
