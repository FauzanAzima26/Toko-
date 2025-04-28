<?php

namespace App\Http\service;

use App\Models\Inventory;
use App\Models\Jasa__Produk;
use App\Models\Keranjang;
use Illuminate\Support\Str;

class cartService
{
    public function getWithPaginate(int $paginate = 10)
    {
        return Keranjang::with(['produk', 'user'])
        ->where('user_id', auth()->user()->id)
        ->paginate($paginate);
    }
}