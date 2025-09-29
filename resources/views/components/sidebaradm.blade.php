       <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.katalog.index') }}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Manajemen Katalog</span>
      </a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.pesanan.index')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Manajemen Pesanan</span>
      </a>
    </li>
       <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.laporan.index')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
  </ul>
</nav>
