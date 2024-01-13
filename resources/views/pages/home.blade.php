@extends('layouts.user')

@section('user-content')

<div class="bg-white">
    <header class="mx-5 d-flex flex-wrap justify-content-center align-items-center row pb-5" style="min-height: 100vh">
        <div class="col-lg-4">
            <div>
                <h1 class="fw-bold fst-italic text-success mb-0" style="font-size: 4rem;">REMASI</h1>
                <P class="fs-4 fw-medium opacity-75" style="letter-spacing: 2px">Resep <span class="text-danger fw-bold" style="letter-spacing: 5px">MP-ASI</span></P>
            </div>
            <p class="fw-light">Temukan berbagai resep makanan pendamping ASI <a href="" class="text-decoration-none text-success fw-semibold">dibawah ini!</a></p>
        </div>

        <div class="col-lg-8">
            <img src="{{ asset('assets/images/hero.png') }}" alt="" class="img-fluid">
        </div>
    </header>

    <section class="px-5 py-5 bg-light shadow-sm">
        <div class="px-5">
            <div class="mb-5">
                <h1 class="fw-bold fs-3" style="letter-spacing: 2px">Kategori</h1>
                <p>Bunda dapat memilih berdasarkan kategori usia buah hati bunda</p>
            </div>

            <div class="d-flex justify-content-center gap-5 flex-wrap">
                @foreach ($categories as $category)
                    <a href="" class="text-decoration-none text-black">
                        <div class="bg-white d-flex justify-content-center align-items-center shadow-sm overflow-hidden" style="width: 10rem; height: 10rem; border-radius: 99999px;">
                            <img src="{{ asset('storage/category/'.$category->image) }}" alt="" style="scale: 0.6; height: 10rem; object-fit: cover;">
                        </div>
                        <p class="fw-semibold fs-5 text-center mt-2">{{ $category->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="px-5">
            <h1 class="fw-bold fs-3 mb-3" style="letter-spacing: 2px">Resep</h1>
            <div class="d-flex flex-wrap gap-3 mb-4">
                @foreach ($recipes as $recipe)
                    <div class="card shadow-sm" style="width: 15rem;">
                        <img src="{{ asset('storage/recipe/'.$recipe->image) }}" class="card-img-top bg-white object-fit-cover" alt="{{ $recipe->name }}" style="height: 13rem">
                        <div class="card-body bg-white">
                            <a href="{{ route('resep-show', $recipe->slug) }}" class="nav-link card-text fw-semibold">{{ $recipe->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="/resep" class="text-decoration-none text-success">Lihat Semua Resep...</a>
        </div>
    </main>
</div>

@endsection
