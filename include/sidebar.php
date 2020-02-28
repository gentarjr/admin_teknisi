<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="data_laporan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Laporan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="jadwal_piket.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Jadwal Piket</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>DATA MASTER</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">MENU POINT</h6>
            <a class="collapse-item" href="nama_kegiatan.php">NAMA KEGIATAN</a>
            <a class="collapse-item" href="kode_perbaikan.php">KODE PERBAIKAN</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="kinerja_teknisi.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Kinerja Teknisi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_pengguna.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pengguna</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->