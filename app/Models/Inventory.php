<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_produk',
        'spesifikasi',
        'image',
        'satuan',
        'harga_jual',
    ];

    public static function booted(){
        static::creating(function($inventory){
            $inventory->uuid = Str::uuid();
        });
    }
}
