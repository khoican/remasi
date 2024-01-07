@extends('layouts.index')

@section('content')

<section class="mb-5">
    @include('includes.categories')
</section>

<h1 class="fw-bold fs-4">Latest Recipe</h1>

<div class="d-flex justify-content-between mt-3">
    <div>
        <img src="https://source.unsplash.com/random" alt="" class="box-2 rounded-2">
        <h3 class="fw-semibold mt-2 fs-5">Food Name</h3>
    </div>
</div>

@endsection
