<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Tampilkan daftar pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::with('user')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    // Tampilkan form tambah pelanggan
    public function create()
    {
        $users = User::all();
        return view('admin.pelanggan.create', compact('users'));
    }

    // Simpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'telpon' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Tampilkan detail pelanggan
    public function show(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    // Tampilkan form edit pelanggan
    public function edit(Pelanggan $pelanggan)
    {
        $users = User::all();
        return view('admin.pelanggan.edit', compact('pelanggan', 'users'));
    }

    // Update pelanggan
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'telpon' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Hapus pelanggan
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}