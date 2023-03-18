<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CMS Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $page == 1 ? 'active' : '' ?>">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 2 ? 'active' : '' ?>">
    <a class="nav-link" href="admin.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Admin</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 3 ? 'active' : '' ?>">
    <a class="nav-link" href="kategori_produk.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Kategori Produk</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 13 ? 'active' : '' ?>">
    <a class="nav-link" href="satuan_produk.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Satuan Produk</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 4 ? 'active' : '' ?>">
    <a class="nav-link" href="jenis_bank.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Jenis Bank</span></a>
  </li>

  <!-- Divider -->
  <li class="nav-item <?= $page == 5 || $page == 6 ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#active" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Users</span>
    </a>
    <div id="active" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Status users:</h6>
        <a class="collapse-item <?= $page == 5 ? 'active' : '' ?>" href="user_active.php">Active</a>
        <a class="collapse-item <?= $page == 6 ? 'active' : '' ?>" href="user_pending.php">Pending</a>
      </div>
    </div>
  </li>
  <li class="nav-item <?= $page == 7 || $page == 8 ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pending" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Seller</span>
    </a>
    <div id="pending" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Status seller:</h6>
        <a class="collapse-item <?= $page == 7 ? 'active' : '' ?>" href="seller_active.php">Active</a>
        <a class="collapse-item <?= $page == 8 ? 'active' : '' ?>" href="seller_pending.php">Pending</a>
      </div>
    </div>
  </li>
  <li class="nav-item <?= $page == 9 || $page == 10 || $page == 11 || $page == 12 ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Transaksi</span>
    </a>
    <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Status seller:</h6>
        <a class="collapse-item <?= $page == 9 ? 'active' : '' ?>" href="transaksi_belum_bayar.php">Belum Bayar</a>
        <a class="collapse-item <?= $page == 10 ? 'active' : '' ?>" href="transaksi_sudah_bayar.php">Sudah Bayar</a>
        <a class="collapse-item <?= $page == 11 ? 'active' : '' ?>" href="transaksi_pengriman.php">Pengiriman</a>
        <a class="collapse-item <?= $page == 12 ? 'active' : '' ?>" href="transaksi_diterima.php">Diterima</a>
      </div>
    </div>
  </li>


  <hr class="sidebar-divider d-none d-md-block">


  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>