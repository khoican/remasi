<nav class="navbar navbar-expand-lg py-3 shadow position-sticky top-0 w-100 z-3 bg-white">
    <div class="container">
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="width: 60px">
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/" class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('home.*') ? 'text-success' : '' }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="/resep" class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('resep.*') ? 'text-success' : '' }}">Resep</a>
                </li>
                <li class="nav-item">
                    @if(Auth::user()->level == 'admin')
                        <a href="/admin" class="nav-link fw-semibold d-flex align-items-center gap-2">Admin Panel</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link fw-semibold d-flex align-items-center gap-2 text-danger">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
