<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
      <span>Pengguna</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/profile') ? 'active' : '' }}" href="/dashboard/profile">
          <span data-feather="user"></span>
          Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/criteria-comparisons*') ? 'active' : '' }}" href="/dashboard/criteria-comparisons">
          <span data-feather="columns"></span>
          Perbandingan Kriteria
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/final-ranking*') ? 'active' : '' }}" href="/dashboard/final-ranking">
          <span data-feather="award"></span>
          Perankingan
        </a>
      </li>
    </ul>

    @can('admin')
      <hr>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
        <span>Admin</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/tourism-objects*') ? 'active' : '' }}" href="/dashboard/tourism-objects">
            <span data-feather="camera"></span>
            Data UMKM
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/criterias*') ? 'active' : '' }}" href="/dashboard/criterias">
            <span data-feather="flag"></span>
            Kriteria
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/alternatives*') ? 'active' : '' }}" href="/dashboard/alternatives">
            <span data-feather="briefcase"></span>
            Alternatif
          </a>
        </li>

        @can('viewAny', App\Models\User::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="users"></span>
            Pengaturan Pengguna
          </a>
        </li>
        @endcan
      </ul>
    @endcan
  </div>
</nav>