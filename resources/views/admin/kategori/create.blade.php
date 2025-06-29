
@extends('layout.app')
@section('content')
<div class="">
    <h1>Tambah Kategori</h1>
</div>
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
@endsection