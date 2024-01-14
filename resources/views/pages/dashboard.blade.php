@extends('layouts.admin')

@section('header', 'Semua Resep')
@section('title', 'Dashboard')
@section('content')

<a href="{{ route('admin.create') }}" class="btn btn-success shadow mb-3 d-flex align-items-center gap-3 w-12 mt-5"><i class="bi bi-plus"></i> Tambah Resep</a>

<table class="table px-5 mt-3 rounded overflow-hidden shadow table-hover">
    <thead class="table-success">
        <tr class="w-full text-center">
            <th scope="col" style="width: 10%">#</th>
            <th scope="col" style="width: 50%">Nama Resep</th>
            <th scope="col" style="width: 20%">Kategori</th>
            <th scope="col" style="width: 10%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($recipes as $recipe)
            <tr>
                <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                <td class="align-middle">{{ $recipe->name }}</td>

                @foreach ($categories as $category)
                    @if($recipe->categoryId == $category->id)
                    <td class="text-center align-middle">{{ $category->name }}</td>
                    @endif
                @endforeach

                <td class="text-center d-flex gap-2">
                    <a href="{{ route('admin.edit', $recipe->id) }}" class="btn btn-warning">
                        <i class="bi bi-pen-fill text-white"></i>
                    </a>

                    <form action="{{ route('admin.destroy', $recipe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="bi bi-trash-fill text-white"></i>
                        </button>
                    </form>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="4" class="text-center bg-danger text-white">Belum Ada Data Kategori</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $recipes->links() }}
</div>

@endsection
