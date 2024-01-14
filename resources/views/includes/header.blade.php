<header class="d-flex justify-content-between align-items-center px-5 py-4">
    <h1 class="fs-3 fw-semibold">
        @yield('header')
    </h1>

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
</header>
