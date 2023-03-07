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
  <li class="nav-item <?= $page == 4 ? 'active' : '' ?>">
    <a class="nav-link" href="satuan_produk.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Satuan Produk</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>