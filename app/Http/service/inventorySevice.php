<?php

namespace App\Http\service;

use App\Models\Inventory;
use Illuminate\Support\Str;

class inventorySevice
{
    public function getWithPaginate(int $paginate = 10)
    {
        return Inventory::latest()->paginate($paginate);
    }

    public function create(array $data)
    {
        $data['slug'] = Str::slug($data['nama_produk']);
        return Inventory::create($data);
    }

    public function getFirstBy($columns, $value){

        return Inventory::where($columns, $value)->first();
    }

    public function update(array $data, string $id)
    {
        return Inventory::where('uuid', $id)->update($data);
    }
}