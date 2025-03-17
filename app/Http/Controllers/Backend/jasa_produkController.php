<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jasa__Produk;

class jasa_produkController extends Controller
{
    public function index($paginate = 5)
    {
        $getData = Jasa__Produk::latest()->paginate($paginate);
        return view('backend.jasa_produk.index', [
            'jasa' => $getData
        ]);
    }
}
