@extends('layouts.admin')

@section('header', 'Tambah Resep')
@section('content')

    <form class="mt-5 row" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">Nama Resep <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white border-success" id="name" name="name" required>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control bg-white border-success" name="description" id="description" rows="5" required></textarea>
            </div>
            <div class="mb-4">
                <label for="ingredients" class="form-label fw-semibold">Bahan-Bahan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" required></textarea>
            </div>
            <div class="mb-4">
                <label for="instructions" class="form-label fw-semibold">Intruksi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('instructions') is-invalid @enderror" name="instructions" id="instructions" required></textarea>
            </div>
            <div class="mb-4">
                <label for="nutritions" class="form-label fw-semibold">Nilai Gizi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('nutritions') is-invalid @enderror" name="nutritions" id="nutritions" required></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-4">
                <label for="gambar" class="form-label fw-semibold">Gambar <span class="text-danger">*</span></label>
                <input type="file" class="form-control bg-white border-success" id="gambar" name="image" required>
            </div>
            <div class="mb-4">
                <select name="categoryId" id="" class="form-control bg-white border-success" required>
                    <option >Pilih Kategori</option>
                    @forelse ($categories as $category)
                        <option type="text" class="form-control" value="{{ $category->id }}" name="categoryId">{{ $category->name }}</option>
                    @empty
                        <option value="" disabled>Tidak Ada Kategori</option>
                    @endforelse

                </select>
            </div>
        </div>

        <div class="text-end px-5 mb-5">
            <p>Pastikan data yang anda masukkan sudah benar sebelum menyimpan data!</p>
            <div class="d-flex gap-4 justify-content-end">
                <a href="/admin" class="btn btn-outline-danger d-flex align-items-center">Batal</a>
                <button type="submit" class="btn btn-success d-flex align-items-center justify-content-center gap-3 fw-semibold" style="width: 8rem"><i class="bi bi-plus"></i> Simpan</button>
            </div>
        </div>

    </form>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ingredients' );
        CKEDITOR.replace( 'instructions' );
        CKEDITOR.replace( 'nutritions' );
    </script>

@endsection
