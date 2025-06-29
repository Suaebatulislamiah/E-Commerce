
@extends('layout.app')
@section('content')
<div class="">
    <h1>Edit Kategori</h1>
</div>
<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama" value="{{ $kategori->nama }}" required>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection