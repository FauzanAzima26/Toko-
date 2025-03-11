<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.inventaris.index') ? 'active' : 'collapsed' }}" href="{{ route('admin.inventaris.index') }}">
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

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Logout Nav -->

  </ul>

</aside><!-- End Sidebar -->