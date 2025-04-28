<?php

namespace App\Http\Controllers\frontend;

use App\Models\Keranjang;
use App\Models\Jasa__Produk;
use Illuminate\Http\Request;
use App\Http\service\cartService;
use App\Http\Controllers\Controller;

class cartController extends Controller
{
    public function __construct(
        private cartService $cartService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->cartService->getWithPaginate(10);
        return view('frontend.cart', [
            'cart' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek autentikasi pengguna
        if (!auth()->check()) {
            return response()->json(['error' => 'Anda harus login terlebih dahulu.'], 401);
        }

        // Validasi input
        $validated = $request->validate([
            'produk_id' => 'required|exists:jasa_produk,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        // Ambil harga produk dari database
        $produk = Jasa__Produk::findOrFail($validated['produk_id']);

        // Cek duplikasi produk di keranjang
        $existingCart = Keranjang::where('user_id', auth()->id())
            ->where('produk_id', $validated['produk_id'])
            ->first();

        if ($existingCart) {
            // Update jumlah jika produk sudah ada di keranjang
            $existingCart->update([
                'jumlah' =>$validated['jumlah']
            ]);
        } else {
            // Tambahkan ke keranjang jika belum ada
            Keranjang::create([
                'user_id' => auth()->id(),
                'produk_id' => $validated['produk_id'],
                'jumlah' => $validated['jumlah'],
                'harga' => $produk->harga
            ]);
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
