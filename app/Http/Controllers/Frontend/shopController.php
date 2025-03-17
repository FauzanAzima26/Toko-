<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopController extends Controller
{
    public function index()
    {
        $getData = Inventory::latest()->get();
        return view('frontend.shop', [
            'produck' => $getData
        ]);
    }
}
