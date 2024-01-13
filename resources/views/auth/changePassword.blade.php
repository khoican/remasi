@extends('layouts.user')

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
                <input type="password" class="form-control bg-white border-success" id="password" name="old_password" required>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control bg-white border-success" id="password" name="new_password" required>
                <p class="fw-light"><span class="text-danger fw-bold">*</span><small>Password minimal 8 karakter</small></p>
            </div>

            <p>Pastikan pasword yang anda ketikkan sudah sesuai sebelum mengganti!</p>
            <button type="submit" class="btn btn-success w-100 text-center mb-2">Ganti Password</button>
        </form>
    </div>
</div>

@endsection
