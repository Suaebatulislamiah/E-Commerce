
@extends('layout.app')
@section('title', 'Kategori')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Daftar Kategori</h1>
    <div class="btn-toolbar mb-md-0">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('kategori.create') }}">Tambah Kategori</a>
        </div>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach ($kategoris as $kategori)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $kategori->nama }}</td>
        <td>
            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection