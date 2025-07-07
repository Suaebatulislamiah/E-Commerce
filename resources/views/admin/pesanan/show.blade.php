@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Pesanan #{{ $pesanan->id }}</h2>

    <div class="mb-3">
        <strong>Pelanggan:</strong> {{ $pesanan->pelanggan->user->name ?? '-' }}<br>
        <strong>Status:</strong> {{ ucfirst($pesanan->status) }}<br>
        <strong>Metode Pembayaran:</strong> {{ ucfirst($pesanan->metode_pembayaran) }}<br>
        <strong>Tanggal:</strong> {{ $pesanan->created_at->format('d-m-Y H:i') }}
    </div>

    <h4>Daftar Item Pesanan</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($pesanan->itemPesanan as $item)
                    @php $total += $item->subtotal; @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->produk->nama ?? '-' }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp{{ number_format($item->produk->harga ?? 0, 2, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->subtotal, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="table-secondary">
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp{{ number_format($total, 2, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('pesanan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
