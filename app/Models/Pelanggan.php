<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['user_id', 'telpon', 'alamat'];

    // Relasi ke user (one to one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke pesanan (one to many)
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

}
