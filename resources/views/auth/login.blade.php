@extends('layouts.auth')

@section('auth-content')


<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 px-5 py-5 rounded-4 shadow">
        <div class="mb-4">
            <h1 class="fs-3 fw-semibold">Login</h1>
            <p class="fw-light">Belum punya akun? daftarkan diri anda <a href="{{ route('register') }}" class="text-success text-decoration-none fw-medium">Daftar Disini</a> </p>
        </div>
        <form action="{{ route('proses_login') }}" method="POST">
            @csrf
            @error('login-gagal')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control bg-white border-success" id="username" name="name" required>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control bg-white border-success" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-success w-100 text-center mb-2">Login</button>

            <a href="" class="text-decoration-none text-info">Lupa Password?</a>
        </form>
    </div>
</main>

@endsection
