@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Pelanggan</h2>
    <div class="mb-3">
        <strong>Nama User:</strong> {{ $pelanggan->user->name ?? '-' }}<br>
        <strong>Email:</strong> {{ $pelanggan->user->email ?? '-' }}<br>
        <strong>Telepon:</strong> {{ $pelanggan->telpon ?? '-' }}<br>
        <strong>Alamat:</strong> {{ $pelanggan->alamat ?? '-' }}<br>
    </div>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection