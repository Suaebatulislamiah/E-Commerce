@extends('layout.app')
@section('title', 'Tambah Produk')
@section('content')
<div class="mb-3">
    <h1>Tambah Produk</h1>
</div>
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-control" name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Gambar Produk</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection