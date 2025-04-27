<?php

namespace App\Http\service;

use App\Models\Inventory;
use App\Models\Jasa__Produk;
use Illuminate\Support\Str;

class produkSevice
{
    public function getWithPaginate(int $paginate = 10)
    {
        return Jasa__Produk::latest()->paginate($paginate);
    }
}