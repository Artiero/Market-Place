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
  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $page == 2 ? 'active' : '' ?>">
    <a class="nav-link" href="profile.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li>
  <li class="nav-item <?= $page == 3 ? 'active' : '' ?>">
    <a class="nav-link" href="satuan_produk_seller.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Produk</span></a>
  </li>
  <li class="nav-item <?= $page == 4 || $page == 5 || $page == 6 || $page == 7 ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Transaksi</span>
    </a>
    <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Status seller:</h6>
        <a class="collapse-item <?= $page == 4 ? 'active' : '' ?>" href="transaksi_belum_bayar.php">Belum Bayar</a>
        <a class="collapse-item <?= $page == 5 ? 'active' : '' ?>" href="transaksi_sudah_bayar.php">Sudah Bayar</a>
        <a class="collapse-item <?= $page == 6 ? 'active' : '' ?>" href="transaksi_pengiriman.php">Pengiriman</a>
        <a class="collapse-item <?= $page == 7 ? 'active' : '' ?>" href="transaksi_diterima.php">Diterima</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>