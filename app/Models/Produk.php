<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'harga', 'stok', 'kategori_id'];

    // Relasi ke kategori (many to one)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
