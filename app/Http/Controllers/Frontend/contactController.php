<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class contactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }
}
