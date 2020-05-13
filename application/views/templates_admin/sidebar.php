<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" class="nav-link  nav-link-lg nav-link-user">
            
            <div class="d-sm-none d-lg-inline-block"> Welcome <?php echo $this->session->userdata('nama') ?>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Vera Rental</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RMS</a>
          </div>
          <ul class="sidebar-menu">
              <li><a class="nav-link" href="<?php echo base_url ('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url ('admin/data_mobil') ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url ('admin/data_type') ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Type</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url ('admin/data_customer') ?>"><i class="fas fa-users"></i> <span>Data Customer</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url ('admin/dashboard/data_supir') ?>"><i class="fas fa-users"></i> <span>Data Supir</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url ('admin/dashboard/order_rental') ?>"><i class="fas fa-random"></i> <span>Order Rental</span></a></li>
              <!-- <li><a class="nav-link" href="<?php echo base_url ('admin/laporan') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li> -->
              <li><a class="nav-link" href="<?php echo base_url ('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
              <!-- <li><a class="nav-link" href="<?php echo base_url ('auth/ganti_password') ?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li> -->
            </ul>
        </aside>
      </div>
    </div>
  <div>