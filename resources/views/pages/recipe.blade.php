@extends('layouts.user')

@section('user-content')

<div class="bg-white">
    <main class="container py-4">
        <div class="px-5">
            <h1 class="fw-bold fs-4 mb-3" style="letter-spacing: 1px">Menampilkan Semua Resep</h1>
            <div class="d-flex flex-wrap gap-3">
                @foreach ($recipes as $recipe)
                    <div class="card shadow-sm" style="width: 15rem;">
                        <img src="{{ asset('storage/recipe/'.$recipe->image) }}" class="card-img-top bg-white object-fit-cover" alt="{{ $recipe->name }}" style="height: 15rem">
                        <div class="card-body bg-white">
                            <a href="{{ route('resep-show', $recipe->id) }}" class="nav-link card-text fw-semibold">{{ $recipe->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

@endsection
