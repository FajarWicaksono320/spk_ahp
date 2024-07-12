<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-light bg-body navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>

        {{-- <button data-target="#navbar-search" type="button" class="navbar-toggler" data-toggle="collapse">
            <i class="icon-search4"></i>
        </button> --}}
    </div>

    <div class="navbar-collapse collapse flex-lg-1 order-2 order-lg-1" id="navbar-search">
        <div class="navbar-search d-flex align-items-center py-2 py-lg-0">
        </div>
    </div>

    <div class="d-flex justify-content-end align-items-center flex-1 flex-lg-0 order-1 order-lg-2">
        <div class="dropdown">
            <div class="cursor-pointer" data-toggle="dropdown">
                <h6 class="font-weight-semibold dropdown-toggle mb-0">{{ auth()->user()->name }}</h6>
                <span class="d-block text-muted">{{ auth()->user()->email }}</span>
            </div>

            <div class="dropdown-menu w-100">
                <a href="/dashboard/profile" class="dropdown-item">
                    <i class="icon-user-plus"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ url ('/signout')}}" method="GET">
                    @csrf
                    <span role="button" class="nav-link px-3 btnSignOut">
                      <span data-feather="log-out"></span>
                      Sign Out
                    </span>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="d-flex justify-content-end align-items-center flex-1 flex-lg-0 order-1 order-lg-2">
        <ul class="navbar-nav flex-row">

            <li class="nav-item nav-item-dropdown-lg dropdown">
                <form id="logout-form" action="{{ url ('/signout')}}" method="GET">
                    @csrf
                    <span role="button" class="nav-link px-3 btnSignOut">
                      <span data-feather="log-out"></span>
                      Sign Out
                    </span>
                </form>
            </li>
        </ul>
    </div> --}}
</div>
<!-- /main navbar -->
