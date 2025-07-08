@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pelanggan</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a class="btn btn-info" href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th style=>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->user->name ?? '-' }}</td>
                    <td>{{ $pelanggan->telpon ?? '-' }}</td>
                    <td>{{ $pelanggan->alamat ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection