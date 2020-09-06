<div class="container">
<!-- Topbar -->
<nav class="navbar navbar-peternak navbar-expand-lg navbar-light">

<!-- Sidebar Toggle (Topbar)
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button> -->

<!-- Topbar Navbar -->
    <a href="{{ route('home') }}" class="navbar-brand">
      <img src="{{ url('frontend/images/Tulisan Termo.png') }}" alt="Tulisan Termo">
    </a>
    
    <div class="logout-item ml-auto">
      <a class="logout-link mr-5" href="{{ route('home') }}">
        Home
      </a>
      <a class="logout-link mr-3" href="#" data-toggle="modal" data-target="#logoutModal">
        Logout
      </a>
    </div>
</nav>
</div>
<!-- End of Topbar -->