<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\service\inventorySevice;
use App\Http\Requests\inventoryRequest;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function __construct(
        private inventorySevice $inventoryService)   
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->inventoryService->getWithPaginate(10);
        return view('backend.inventaris.index', [
            'inventories' => $data
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
    public function store(inventoryRequest $request)
    {
        // Validasi data
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'spesifikasi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'satuan' => 'required|in:pcs,kg,liter,meter',
            'stock' => 'required|integer|min:0', // Validasi untuk stock
        ]);
    
        // Menyimpan gambar dengan path yang benar
        $imagePath = $request->file('image')->store('images', 'public');
        $imageFullPath = 'storage/' . $imagePath; // Path yang dapat diakses dari frontend
    
        // Membuat entri baru di database
        $inventory = Inventory::create([
            'nama_produk' => $request->nama_produk,
            'harga_jual' => $request->harga_jual,
            'spesifikasi' => $request->spesifikasi,
            'image' => $imageFullPath,
            'satuan' => $request->satuan,
            'stock' => $request->stock, // Menambahkan stock
        ]);
    
        // Mengembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'Inventaris berhasil ditambahkan!',
            'data' => $inventory
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $inventory = $this->inventoryService->getFirstBy('uuid', $uuid);

        if (!$inventory) {
            return response()->json(['message' => 'Inventaris tidak ditemukan.'], 404);
        }

        return response()->json(['data' => $inventory]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(inventoryRequest $request, string $uuid)
    {
        // Validasi data
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'spesifikasi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'satuan' => 'required|in:pcs,kg,liter,meter',
            'stock' => 'required|integer|min:0',
        ]);
    
        // Mencari inventaris berdasarkan UUID
        $inventory = $this->inventoryService->getFirstBy('uuid', $uuid);
    
        if (!$inventory) {
            return response()->json(['message' => 'Inventaris tidak ditemukan.'], 404);
        }
    
        try {
            // Cek apakah ada gambar baru yang diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada gambar baru
                if (!empty($inventory->image)) {
                    $oldImagePath = str_replace('storage/', '', $inventory->image);
                    if (Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                }
    
                // Simpan gambar baru
                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = 'storage/' . $imagePath;
            } else {
                // Jika tidak ada gambar baru, gunakan gambar lama
                $data['image'] = $inventory->image;
            }
    
            // Update inventaris dengan data baru
            $inventory->update($data);
    
            return response()->json([
                'success' => true,
                'message' => 'Inventaris berhasil diperbarui!',
                'data' => $inventory
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating inventory: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui inventaris.'], 500);
        }
    }
    
    
    

    public function destroy(string $uuid)
    {
        try {
            // Cari data inventaris berdasarkan UUID
            $inventory = $this->inventoryService->getFirstBy('uuid', $uuid);
    
            if (!$inventory) {
                return response()->json(['message' => 'Inventaris tidak ditemukan.'], 404);
            }
    
            // Hapus gambar dari storage jika ada
            if (!empty($inventory->image)) {
                $oldImagePath = str_replace('storage/', '', $inventory->image);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }
    
            // Hapus data dari database
            $inventory->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Inventaris berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting inventory: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus inventaris.'], 500);
        }
    }
}
