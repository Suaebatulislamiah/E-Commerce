@extends('layout.app')

@section('content')
<div class="container">
    <h1>Pesanan Baru</h1>
    <a href="{{ route('pesanan.index') }}" class="btn btn-secondary-3">Kembali</a>

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- kolom kiri: Kirim produk -->
            <div class="col-md-7">
                <h3>Pilih Produk</h3>
                <div class="row">
                    @foreach ($produks as $produk)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top produk-img" alt="{{ $produk->nama }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $produk->nama }}</h5>
                                <p class="card-text text-muted">Rp {{ number_format($produk->harga, 2) }}</p>
                                <button type="button" 
                                    class="btn btn-success btn-sm tambah-keranjang" 
                                    data-id="{{ $produk->id }}" 
                                    data-nama="{{ $produk->nama }}" 
                                    data-harga="{{ $produk->harga }}" 
                                    data-gambar="{{ asset('storage/' . $produk->gambar) }}">
                                    Tambah Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- kolom kanan: Produk yang dipilih -->
            <div class="col-md-5">
                <h3>Produk yang dipilih</h3>
                <ul class="list-group mb-3" id="list-pesanan">
                    <li class="list-group-item text-muted text-center" id="empty-message">
                        Belum ada produk yang dipilih
                    </li>
                </ul>
                <div class="form-group">
                    <label for="metode-pembayaran">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control">
                        <option value="transfer-bank">Transfer Bank</option>
                        <option value="e-wallet">E-Wallet</option>
                        <option value="cod">Cash on Delivery</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h4>Total: </h4>
                    <h4><strong>Rp. <span id="total-harga">0</span></strong></h4>
                </div>
                <button type="submit" class="btn btn-primary mt-3 w-100">Buat Pesanan</button>
            </div>
        </div>
    </form>
</div>

<style>
    .produk-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .list-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let listPesanan = document.getElementById('list-pesanan');
        let totalHargaElement = document.getElementById('total-harga');
        let emptyMessage = document.getElementById('empty-message');
        let pesananMap = new Map();

        document.querySelectorAll('.tambah-keranjang').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let produkId = btn.dataset.id;
                let produkNama = btn.dataset.nama;
                let harga = parseInt(btn.dataset.harga);
                let gambar = btn.dataset.gambar;

                if (pesananMap.has(produkId)) {
                    alert('Produk sudah ditambahkan.');
                    return;
                }

                pesananMap.set(produkId, {
                    nama: produkNama,
                    harga: harga,
                    jumlah: 1,
                    subtotal: harga
                });

                if (emptyMessage) emptyMessage.style.display = 'none';

                let listItem = document.createElement('li');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center flex-wrap';

                listItem.innerHTML = `
                    <div class="d-flex align-items-center mb-2">
                        <img src="${gambar}" alt="${produkNama}" class="list-img mr-2">
                        <span class="ml-2">${produkNama}</span>
                    </div>
                    <input type="hidden" name="produk_id[]" value="${produkId}">
                    <input type="number" name="jumlah[]" value="1" class="form-control form-control-sm jumlah-produk mr-2" data-id="${produkId}" min="1" style="width: 70px;">
                    <strong>Rp <span class="subtotal">${harga.toLocaleString()}</span></strong>
                    <button type="button" class="btn btn-danger btn-sm hapus-produk ml-2" data-id="${produkId}">Hapus</button>
                `;

                listPesanan.appendChild(listItem);

                updatePesanan();

                listItem.querySelector('.jumlah-produk').addEventListener('input', updateJumlah);
                listItem.querySelector('.hapus-produk').addEventListener('click', hapusProduk);
            });
        });

        function updateJumlah(event) {
            let input = event.target;
            let produkId = input.dataset.id;
            let jumlah = parseInt(input.value) || 1;

            let produk = pesananMap.get(produkId);
            produk.jumlah = jumlah;
            produk.subtotal = jumlah * produk.harga;

            input.closest('li').querySelector('.subtotal').innerText = produk.subtotal.toLocaleString();
            updatePesanan();
        }

        function hapusProduk(event) {
            let button = event.target;
            let produkId = button.dataset.id;

            pesananMap.delete(produkId);
            button.closest('li').remove();

            if (pesananMap.size === 0) {
                emptyMessage.style.display = 'block';
            }

            updatePesanan();
        }

        function updatePesanan() {
            let total = 0;
            pesananMap.forEach(item => {
                total += item.subtotal;
            });
            totalHargaElement.innerText = total.toLocaleString();
        }
    });
</script>
@endsection