<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'spesifikasi' => 'required|string',
            "image" => $this->isMethod('POST') ? "required|file|image|max:2048|mimes:png,jpg,jpeg,webp|mimetypes:image/png,image/jpg,image/jpeg,image/webp" : "nullable|file|image|max:2048|mimes:png,jpg,jpeg,webp|mimetypes:image/png,image/jpg,image/jpeg,image/webp",
            'satuan' => 'required|in:pcs,kg,liter,meter',
            'stock' => 'required|integer|min:0', // Validasi untuk stock
        ];
    }
}
