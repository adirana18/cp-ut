<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #154F2E;">
    <!-- Brand Logo -->
    <a href="bo" class="brand-link">
      <img src="assets-login/images/utlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Capstone Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="bo" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i> 
              <p>Dashboard</p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="pesanan" class="nav-link">
              <i class="nav-icon fa fa-file"></i> 
              <p>Pesanan</p>
            </a>
          
          <!-- 
          <?php if ( $levelLogin === "admin" ) { ?>
          <li class="nav-item">
            <a href="upload" class="nav-link">
              <i class="nav-icon fa fa-file"></i> 
              <p>Upload</p>
            </a>
          </li>
-->
        
          <?php } ?>
          <?php if ( $levelLogin === "admin" ) { ?>
          <li class="nav-item">
            <a href="user-type" class="nav-link">
              <i class="nav-icon fa fa-users"></i> 
              <p>Users</p>
            </a>
          </li>
          <?php } ?>

          

          <?php if ( $levelLogin === "super admin" ) { ?>
          <li class="nav-item">
            <a href="user-type" class="nav-link">
              <i class="nav-icon fa fa-users"></i> 
              <p>Pengguna</p>
            </a>
          </li>
          
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
