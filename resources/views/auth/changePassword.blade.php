@extends('layouts.user')

@section('title', 'Ganti Password')
@section('user-content')

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert" style="z-index: 999;">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert" style="z-index: 999;">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container d-flex justify-content-center py-5">
    <div class="col-md-4 px-5">
        <div class="mb-4">
            <h1 class="fs-3 fw-semibold">Ganti Password</h1>
        </div>
        <form action="{{ route('proses-change-password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Password Lama</label>
                <div class="d-flex position-relative align-items-center">
                    <input type="password" class="form-control bg-white border-success" id="old_password" name="old_password" required>
                    <button type="button" class="btn position-absolute end-0 btn-old-password" style="outline: none; border: none"><i class="bi bi-eye-slash"></i></button>
                </div>
            </div>
            <div class="mb-5">
                <label for="new_password" class="form-label">Password Baru</label>
                <div class="d-flex position-relative align-items-center">
                    <input type="password" class="form-control bg-white border-success" id="new_password" name="new_password" required>
                    <button type="button" class="btn position-absolute end-0 btn-new-password" style="outline: none; border: none"><i class="bi bi-eye-slash"></i></button>
                </div>
                <p class="fw-light"><span class="text-danger fw-bold">*</span><small>Password minimal 8 karakter</small></p>
            </div>

            <p>Pastikan pasword yang anda ketikkan sudah sesuai sebelum mengganti!</p>
            <button type="submit" class="btn btn-success w-100 text-center mb-2">Ganti Password</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    const btnOldPassword = document.querySelector('.btn-old-password');
    const btnNewPassword = document.querySelector('.btn-new-password');
    const inputOldPassword = document.querySelector('#old_password');
    const inputNewPassword = document.querySelector('#new_password');

    btnOldPassword.addEventListener('click', () => {
        const icon = btnOldPassword.querySelector('.bi');

        inputOldPassword.type = (inputOldPassword.type === 'password') ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
    })

    btnNewPassword.addEventListener('click', () => {
        const icon = btnNewPassword.querySelector('.bi');

        inputNewPassword.type = (inputNewPassword.type === 'password') ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
    })
</script>

@endsection
