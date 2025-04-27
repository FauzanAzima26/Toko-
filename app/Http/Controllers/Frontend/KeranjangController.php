<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use App\Models\Jasa__Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
{
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
}
