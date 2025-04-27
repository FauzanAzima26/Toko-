<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jasa__Produk;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'harga',
    ];

    public function produk()
    {
        return $this->belongsTo(Jasa__Produk::class, 'produk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
