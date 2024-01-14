@extends('layouts.auth')

@section('title', 'Register')
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
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white border-success" id="username" name="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control bg-white border-success" id="username" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="d-flex position-relative align-items-center">
                    <input type="password" class="form-control bg-white border-success" id="password" name="password" required>
                    <button type="button" class="btn position-absolute end-0 btn-password" style="outline: none; border: none"><i class="bi bi-eye-slash"></i></button>
                </div>
                <p class="fw-light"><span class="text-danger fw-bold">*</span><small>Password minimal 8 karakter</small></p>
            </div>
            <div class="mb-5">
                <label for="confirm_password" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                <div class="d-flex position-relative align-items-center">
                    <input type="password" class="form-control bg-white border-success" id="confirm_password" name="confirm_password" required>
                    <button type="button" class="btn position-absolute end-0 btn-confirm-password" style="outline: none; border: none"><i class="bi bi-eye-slash"></i></button>
                </div>
                <p class="fw-light"><span class="text-danger fw-bold">*</span><small>Ketik ulang password anda</small></p>
            </div>

            <button type="submit" class="btn btn-success float-end d-flex align-items-center gap-3">
                Daftar
                <i class="bi bi-person-fill-add"></i>
            </button>
        </form>
    </div>
</main>

<script type="text/javascript">
    const btnPassword = document.querySelector('.btn-password');
    const btnConfirmPassword = document.querySelector('.btn-confirm-password');
    const inputPassword = document.querySelector('#password');
    const inputConfirmPassword = document.querySelector('#confirm_password');

    btnPassword.addEventListener('click', () => {
        const icon = btnPassword.querySelector('.bi');

        inputPassword.type = (inputPassword.type === 'password') ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
    })

    btnConfirmPassword.addEventListener('click', () => {
        const icon = btnConfirmPassword.querySelector('.bi');

        inputConfirmPassword.type = (inputConfirmPassword.type === 'password') ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
    })
</script>

@endsection
