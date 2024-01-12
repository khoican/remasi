<nav class="navbar navbar-expand-lg py-3 shadow position-sticky top-0 w-100 z-3 bg-white">
    <div class="container">
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="width: 60px">
        </div>

        <div class="navbar-nav d-flex align-items-center gap-3">
            <a href="/" class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('home.*') ? 'text-success' : '' }}">Beranda</a>
            <a href="/resep" class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('resep.*') ? 'text-success' : '' }}">Resep</a>

            @if(Auth::user()->level == 'admin')
                <a href="/admin" class="nav-link fw-semibold d-flex align-items-center gap-2">Admin Panel</a>
            @endif

            <a href="{{ route('logout') }}" class="btn btn-outline-danger fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('akun.*') ? 'text-success' : '' }}">Logout</a>

        </div>
    </div>
</nav>
