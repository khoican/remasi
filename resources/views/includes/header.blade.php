<header class="d-flex justify-content-between align-items-center px-5 py-3">
    <h1 class="fs-3 fw-semibold">
        @yield('header')
    </h1>

    <a href="{{ route('logout') }}" class="d-flex flex-row gap-3 align-items-center btn btn-outline-danger">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</header>
