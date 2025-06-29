@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="h2 mb-4">Daftar Item Pesanan</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pesanan ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($item_pesanans as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pesanan_id }}</td>
                <td>{{ $item->produk->nama ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('item_pesanans.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('item_pesanans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('item_pesanans.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus item ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada item pesanan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection