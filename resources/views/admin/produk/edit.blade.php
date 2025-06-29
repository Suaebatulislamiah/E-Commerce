@extends('layout.app')
@section('title', 'Edit Produk')
@section('content')
<div class="mb-3">
    <h1>Edit Produk</h1>
</div>
<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}" required min="0" max="1000000000">
    </div>
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-control" name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Gambar Produk</label><br>
        @if($produk->gambar)
            <img src="{{ asset('storage/'.$produk->gambar) }}" width="100" alt="gambar produk"><br>
        @endif
        <input type="file" class="form-control" name="gambar">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection