@extends('layouts.auth')

@section('auth-content')

<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-50 px-5 py-5 rounded-4 shadow">
        <div class="mb-4">
            <h1 class="fs-3 fw-semibold text-success">Daftar</h1>
        </div>
        <form class="px-3" action="{{ route('proses_register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <p class="text-end">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none text-success">Masuk Disini</a></p>
            <button type="submit" class="btn btn-success float-end d-flex align-items-center gap-3">
                Daftar
                <i class="bi bi-person-fill-add"></i>
            </button>
        </form>
    </div>
</main>

@endsection
