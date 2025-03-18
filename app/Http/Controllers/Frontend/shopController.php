<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jasa__Produk;

class shopController extends Controller
{
    public function index()
    {
        $getData = Jasa__Produk::latest()->get();
        return view('frontend.shop', [
            'produck' => $getData
        ]);
    }
}
