<?php

namespace App\Http\Controllers\Backend;

use App\Models\Jasa__Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class jasa_produkController extends Controller
{
    public function index($paginate = 5)
    {
        $getData = Jasa__Produk::latest()->paginate($paginate);
        return view('backend.jasa_produk.index', [
            'jasa' => $getData
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'jasa_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string|max:1000',
        ]);
    
        // Menyimpan gambar dengan path yang benar
        $imagePath = $request->file('image')->store('images', 'public');
        $imageFullPath = 'storage/' . $imagePath; // Path yang dapat diakses dari frontend
    
        // Membuat entri baru di database
        $jasa = Jasa__Produk::create([
            'jasa_produk' => $request->jasa_produk,
            'harga' => $request->harga,
            'image' => $imageFullPath,
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Mengembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'Inventaris berhasil ditambahkan!',
            'data' => $jasa
        ]);
    }

    public function show(string $uuid)
    {
        $jasa = Jasa__Produk::where('uuid', $uuid)->first();

        if (!$jasa) {
            return response()->json(['message' => 'Inventaris tidak ditemukan.'], 404);
        }

        return response()->json(['data' => $jasa]);
    }

    public function update(Request $request, string $uuid)
    {
        // Validasi data
        $request->validate([
            'jasa_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string|max:1000',
        ]);
    
        // Mencari jasa berdasarkan UUID
        $jasa = Jasa__Produk::where('uuid', $uuid)->first();
    
        if (!$jasa) {
            return response()->json(['message' => 'Jasa/produk tidak ditemukan.'], 404);
        }
    
        try {
            // Inisialisasi data untuk update
            $data = [
                'jasa_produk' => $request->jasa_produk,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ];
    
            // Jika ada gambar baru diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if (!empty($jasa->image)) {
                    $oldImagePath = str_replace('storage/', '', $jasa->image);
                    if (Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                }
    
                // Simpan gambar baru
                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = 'storage/' . $imagePath;
            }
    
            // Update jasa dengan data baru
            $jasa->update($data);
    
            return response()->json([
                'success' => true,
                'message' => 'Jasa/Produk berhasil diperbarui!',
                'data' => $jasa
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating Jasa/Produk: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui jasa/produk.'], 500);
        }
    }

    public function destroy(string $uuid)
    {
        try {
            // Cari data berdasarkan UUID
            $jasa = Jasa__Produk::where('uuid', $uuid)->first();
    
            if (!$jasa) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }
    
            // Hapus gambar dari storage jika ada
            if (!empty($jasa->image)) {
                $oldImagePath = str_replace('storage/', '', $jasa->image);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }
    
            // Hapus data dari database
            $jasa->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Inventaris berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting jasa: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
    
}
