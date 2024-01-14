@extends('layouts.user')

@section('title', 'Resep')
@section('user-content')

<div class="bg-white">
    <main class="container py-4">
        <div class="px-5">
            @if ($recipes->count() > 0)
                @if (request()->routeIs('resep.*'))
                    <h1 class="fw-semibold fs-4 mb-4" style="letter-spacing: 1px">Menampilkan Semua Resep</h1>
                @elseif (request()->routeIs('resep-category'))
                    <h1 class="fw-semibold fs-4 mb-4" style="letter-spacing: 1px">Menampilkan Resep Untuk Kategori {{ $category->name }}</h1>
                @endif
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($recipes as $recipe)
                        <div class="card shadow-sm" style="width: 15rem;">
                            @if ($recipe->image == null)
                            <img src="{{ asset('assets/images/eating-baby.jpg') }}" class="card-img-top bg-white object-fit-cover" alt="{{ $recipe->name }}" style="height: 13rem">
                            @else
                            <img src="{{ asset('storage/recipe/'.$recipe->image) }}" class="card-img-top bg-white object-fit-cover" alt="{{ $recipe->name }}" style="height: 13rem">
                            @endif
                            <div class="card-body bg-white">
                                <a href="{{ route('resep-show', $recipe->slug) }}" class="nav-link card-text fw-semibold">{{ $recipe->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex align-items-center mt-5 flex-column">
                    <img src="{{ asset('assets/images/no-data.png') }}" alt="" class="w-50 mb-3">
                    <h3>Data Resep Belum Tersedia</h3>
                </div>
            @endif
        </div>
    </main>
</div>

@endsection
