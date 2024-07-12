<!-- App logo and controls -->
<div class="navbar navbar-light bg-transparent navbar-static">
	<div class="navbar-brand flex-fill wmin-0">
		<a href="/dashboard" class="d-inline-block">
			<img style="width: 35px; height: 35px;" src="images/logoku.png" class="sidebar-resize-hide" alt="">
			<img src="{{ asset('images/logoku.png') }}" class="sidebar-resize-show" alt="">
		</a>
	</div>

	<ul class="navbar-nav align-self-center ml-auto sidebar-resize-hide">
		<li class="nav-item dropdown">
			<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
				<i class="icon-transmission"></i>
			</button>

			<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-mobile-main-toggle d-lg-none">
				<i class="icon-cross2"></i>
			</button>
		</li>
	</ul>
</div>
<!-- /app logo and controls -->


<!-- Sidebar content -->
<div class="sidebar-content">

	<!-- Main navigation -->
	<div class="sidebar-section">
		<ul class="nav nav-sidebar" data-nav-type="accordion">

			<!-- Main -->
			<li class="nav-item-header pt-0"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
					<i class="icon-home"></i>
					<span>
						Dashboard
					</span>
				</a>
			</li>
			<li class="nav-item nav-item-submenu">
				<a href="#" class="nav-link"><i class="icon-user"></i> <span>Pengguna</span></a>

				<ul class="nav nav-group-sub" data-submenu-title="Layouts">
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">Dashboard</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/profile') ? 'active' : '' }}" href="/dashboard/profile">Profil</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/criteria-comparisons*') ? 'active' : '' }}" href="/dashboard/criteria-comparisons">Perbandingan Kriteria</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/final-ranking*') ? 'active' : '' }}" href="/dashboard/final-ranking">Perankingan</a></li>
				</ul>
			</li>

			@can('admin')
			<li class="nav-item nav-item-submenu">
				<a href="#" class="nav-link"><i class="icon-chart"></i> <span>ADMIN</span></a>

				<ul class="nav nav-group-sub" data-submenu-title="Layouts">
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/tourism-objects*') ? 'active' : '' }}" href="/dashboard/tourism-objects">Data UMKM</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/criterias*') ? 'active' : '' }}" href="/dashboard/criterias">Kriteria</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/alternatives*') ? 'active' : '' }}" href="/dashboard/alternatives">Alternatif</a></li>
					@can('viewAny', App\Models\User::class)
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">Pengaturan Pengguna</a></li>
					@endcan
				</ul>
			</li>
			@endcan
			<form id="logout-form" action="{{ url ('/signout')}}" method="GET">
				@csrf
				<span role="button" class="nav-link px-3 btnSignOut">
				  <span data-feather="log-out"></span>
				  Sign Out
				</span>
			</form>
		</ul>
	</div>
	<!-- /main navigation -->
</div>
<!-- /sidebar content -->