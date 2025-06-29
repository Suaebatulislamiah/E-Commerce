@extends('layout.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesanan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="shopping-cart"></span>
            Masukan Keranjang
          </button>
        </div>
      </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Daftar Pesanan</h1>
    <div class="btn-toolbar mb-md-0">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('pesanan.create') }}">Tambah Kategori</a>
        </div>
    </div>
    </div>

    <div class="container">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>N0</th>
                <th>Pelanggan</th>
                <th>Status</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->pelanggan->user->name ?? 'Tidak diketahui' }}</td>
                <td>{{ ucfirst($pesanan->status) }}</td>
                <td>Rp{{ number_format($pesanan->total, 2) }}</td>
                <td>
                    <a href="{{ route('pesanan.show', $pesanan->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection