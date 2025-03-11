<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\service\inventorySevice;

class InventoryController extends Controller
{
    public function __construct(private inventorySevice $inventoryService){}
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
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'spesifikasi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'satuan' => 'required|string|max:50',
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('image')->store('images', 'public');

        // Membuat entri baru di database
        $inventory = Inventory::create([
            'nama_produk' => $request->nama_produk,
            'harga_jual' => $request->harga_jual,
            'spesifikasi' => $request->spesifikasi,
            'image' => $imagePath,
            'satuan' => $request->satuan,
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
