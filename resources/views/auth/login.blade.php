@extends('layouts.auth')

@section('title', 'Login')
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
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white border-success" id="username" name="name" required>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="d-flex position-relative align-items-center">
                    <input type="password" class="form-control bg-white border-success" id="password" name="password" required>
                    <button type="button" class="btn position-absolute end-0 btn-password" style="outline: none; border: none"><i class="bi bi-eye-slash"></i></button>
                </div>
                <p class="fw-light"><span class="text-danger fw-bold">*</span><small>Password minimal 8 karakter</small></p>
            </div>

            <button type="submit" class="btn btn-success w-100 text-center mb-2">Login</button>
        </form>
    </div>
</main>

<script type="text/javascript">
    const btnPassword = document.querySelector('.btn-password');
    const inputPassword = document.querySelector('#password');

    btnPassword.addEventListener('click', () => {
        inputPassword.type = (inputPassword.type === 'password') ? 'text' : 'password';
    })
</script>

@endsection
