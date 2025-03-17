<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.inventaris.index') ? 'active' : 'collapsed' }}"
        href="{{ route('admin.inventaris.index') }}">
        <i class="bi bi-grid"></i>
        <span>Inventaris</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('log') ? 'active' : 'collapsed' }}" href="{{ route('log') }}">
        <i class="bi bi-grid"></i>
        <span>Log Harian</span>
      </a>
    </li><!-- End Log Harian Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.jasa_produk.index') ? 'active' : 'collapsed' }}" href="{{ route('admin.jasa_produk.index') }}">
        <i class="bi bi-grid"></i>
        <span>Jasa/Produk</span>
      </a>
    </li><!-- End Jasa/Produk Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('logout') }}" onclick=" event.preventDefault();
                            document.getElementById('logout-form').submit();"">
        <i class=" bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li><!-- End Logout Nav -->

  </ul>

</aside><!-- End Sidebar -->