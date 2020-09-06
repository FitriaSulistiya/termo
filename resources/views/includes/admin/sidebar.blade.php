<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-text mx-3">TERMO Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Menu -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('peternak.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Peternak</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('penyuluhan.index') }}">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>Penyuluhan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('peternak_gallery.index') }}">
    <i class="fas fa-images"></i>
      <span>Galeri Peternak</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('penyuluhan_gallery.index') }}">
      <i class="fas fa-images"></i>
      <span>Galeri Penyuluhan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('users.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span></a>
  </li>
</ul>
<!-- End of Sidebar -->