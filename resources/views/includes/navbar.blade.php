<nav class="navbar navbar-expand-lg py-3 shadow position-sticky top-0 w-100 z-3 bg-white">
    <div class="container">
        <a href="/">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="width: 60px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/" class="nav-link fw-semibold {{ request()->routeIs('home.*') ? 'text-success' : '' }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="/resep" class="nav-link fw-semibold me-2 {{ request()->routeIs('resep.*') ? 'text-success' : '' }}">Resep</a>
                </li>
                <li class="nav-item">
                    @if(Auth::user() && Auth::user()->level == 'admin')
                        <a href="/admin" class="nav-link fw-semibold">Admin Panel</a>
                    @endif
                </li>
                @if(Auth::user())
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-success fw-semibold dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-6"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('change_password') }}">Ganti Password</a></li>
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger">Logout</a>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-outline-success fw-semibold">Daftar</a>
                    <a href="{{ route('login') }}" class="btn btn-success fw-semibold">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
