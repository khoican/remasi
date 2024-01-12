@extends('layouts.user')

@section('user-content')

<div class="bg-white">

    <main class="container py-5 d-flex gap-5">
        <div style="width: 40%">
            <img src="{{ asset('storage/recipe/'.$recipe->image) }}" alt="{{ $recipe->name }}" class="w-100 rounded-4 position-sticky" style="top: 10rem;">
        </div>
        <div style="width: 60%">
            <h1>{{ $recipe->name }}</h1>

            <div class="mt-5">
                <h3 class="fs-5 fw-semibold">Deskripsi</h3>
                {{ $recipe->description }}
            </div>

            <div class="mt-5">
                <h3 class="fs-5 fw-semibold">Bahan-Baha</h3>
                {!! $recipe->ingredients !!}
            </div>

            <div class="mt-5">
                <h3 class="fs-5 fw-semibold">Langkah Pembuatan</h3>
                {!! $recipe->instructions !!}
            </div>

            <div class="mt-5">
                <h3 class="fs-5 fw-semibold">Kandungan Gizi</h3>
                {!! $recipe->nutritions !!}
            </div>
        </div>
    </main>

    <section class="container my-5">
        <div>
            <h1 class="fw-bold fs-3 mb-4" style="letter-spacing: 2px"><i class="bi bi-chat-left-text-fill"></i> Diskusi</h1>
            <p class="mb-1">Anda dapat berdiskusi mengenai resep ini</p>
            <form action="{{ route('comment') }}" class="d-flex gap-2 mb-3" method="POST">
                @csrf
                <input type="hidden" value="{{ $recipe->id }}" name="recipeId">
                <input type="hidden" value="{{ Auth::user()->id }}" name="userId">
                <input type="text" class="form-control fs-6" placeholder="Tulis Komentar Untuk Resep {{ $recipe->name }}" name="comment">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>

        @forelse($comments as $comment)

        <div class="card shadow-sm mb-3">
            <div class="card-body d-flex gap-4 align-items-center">
                <div class="d-flex align-items-center bg-success rounded-circle justify-content-center" style="width: 3rem; height: 3rem">
                    <i class="bi bi-person fs-3 text-white"></i>
                </div>

                <div>
                    @if($comment->user->id == Auth::user()->id)
                        <p class="mb-0 fw-semibold">Anda</p>
                    @else
                        <p class="mb-0 fw-semibold">{{ $comment->user->name }}</p>
                    @endif
                    <p class="mb-0 fw-light">{{ $comment->created_at->diffForHumans() }}</p>
                    <p class="card-text">{{ $comment->comment }}</p>
                </div>
            </div>
            <div class="card-footer ps-5">
                <form action="{{ route('reply') }}" class="d-flex gap-2" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $comment->id }}" name="commentId">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="userId">
                    <input type="text" class="form-control fs-6" placeholder="Tulis Balasan Untuk Komentar Ini" name="comment">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
                @forelse ($replies as $reply)
                    @if ($reply->commentId == $comment->id)
                        <div class="d-flex gap-4 align-items-center mt-2 border-bottom py-1">
                            <div class="d-flex align-items-center bg-success rounded-circle justify-content-center" style="width: 2.5rem; height: 2.5rem">
                                <i class="bi bi-person fs-5 text-white"></i>
                            </div>

                            <div>
                                @if($reply->userId == Auth::user()->id)
                                    <p class="mb-0 fw-semibold">Anda</p>
                                @else
                                    <p class="mb-0 fw-semibold"><small>{{ $reply->user->name }}</small></p>
                                @endif
                                <p class="mb-0 fw-light"><small>{{ $reply->created_at->diffForHumans() }}</small></p>
                                <p class="card-text">{{ $reply->comment }}</p>
                            </div>
                        </div>
                    @endif
                @empty

                @endforelse
            </div>
        </div>

        @empty

        @endforelse
    </section>
</div>

@endsection
