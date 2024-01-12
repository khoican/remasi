@extends('layouts.admin')

@section('header', 'Kategori')
@section('content')

<main class="py-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success shadow mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Kategori
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="image">
                        </div>
                        <div class="text-end mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table px-5 mt-3 table-hover rounded overflow-hidden shadow">
        <thead>
            <tr class="w-full text-center">
                <th scope="col" style="width: 10%">#</th>
                <th scope="col" style="width: 30%">Gambar</th>
                <th scope="col" style="width: 50%">Nama Kategori</th>
                <th scope="col" style="width: 10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                    <td class="text-center align-middle">
                        <img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}" style="width: 150px; height: 150px">
                    </td>
                    <td class="text-center align-middle">{{ $category->name }}</td>
                    <td class="text-center align-middle">
                        <form action="{{ route('kategori.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
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
</main>


@endsection
