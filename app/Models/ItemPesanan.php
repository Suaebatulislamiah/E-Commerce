<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'subtotal'];

    // Relasi ke pesanan (many to one)
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi ke produk (many to one)
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class);
    }
    }
