<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jasa__Produk extends Model
{
    use HasFactory;
    
    protected $table = 'jasa_produk';

    protected $fillable = [
        'uuid',
        'jasa_produk',
        'harga',
        'image',
        'deskripsi'
    ];

    public static function booted(){
        static::creating(function($inventory){
            $inventory->uuid = Str::uuid();
        });
    }
}
