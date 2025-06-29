<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama'];

    //relasi ke produk (one to many)
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
