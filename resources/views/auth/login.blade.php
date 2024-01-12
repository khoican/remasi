@extends('layouts.auth')

@section('auth-content')

<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-md-75 px-5 py-5 rounded-4 shadow">
        <div class="mb-4">
            <h1 class="fs-3 fw-semibold text-success">Login</h1>
            <p class="fw-light">Silahkan masukkan username dan password anda</p>
        </div>
        <form class="px-3" action="{{ route('proses_login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <p class="text-end">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none text-success">Daftar Disini</a></p>
            <button type="submit" class="btn btn-success float-end d-flex align-items-center gap-3">
                Login
                <i class="bi bi-box-arrow-in-right"></i>
            </button>
        </form>
    </div>
</main>

@endsection
