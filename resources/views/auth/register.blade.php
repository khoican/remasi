@extends('layouts.auth')

@section('auth-content')

<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 px-5 py-5 rounded-4 shadow">
        <div class="mb-4">
            <h1 class="fs-3 fw-semibold">Daftar</h1>
            <p class="fw-light">Sudah punya akun? <a href="{{ route('login') }}" class="text-success text-decoration-none fw-medium">Masuk Disini</a> </p>
        </div>
        <form action="{{ route('proses_register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name" required>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-success float-end d-flex align-items-center gap-3">
                Daftar
                <i class="bi bi-person-fill-add"></i>
            </button>
        </form>
    </div>
</main>

@endsection
