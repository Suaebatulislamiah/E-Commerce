@extends('layout.app')
@section('title', 'Produk')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Daftar Produk</h1>
    <a class="btn btn-info" href="{{ route('produk.create') }}">Tambah Produk</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>
                @if($produk->gambar)
                    <img src="{{ asset('storage/'.$produk->gambar) }}" width="80" alt="gambar produk">
                @else
                    <span>Tidak ada gambar</span>
                @endif
            </td>
            <td>{{ $produk->nama }}</td>
            <td>Rp{{ number_format($produk->harga,0,',','.') }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->kategori->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection