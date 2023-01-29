<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('manage-products');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $product = $this->route('product');
        return [
            'name' => [
                'string',
                'required',
            ],
            'detail' => [
                'string',
                'required',
            ],
            'harga' => [
                'required',
                'integer',
            ],
            'stok' => [
                'required',
                'integer',
            ],
            'foto' => [
                'sometimes', // to indicate that the field is optional
                'file',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ],
        ];
    }

    public function messages()
    {
        return [
            'foto.required' => 'Foto produk harus diisi',
            'foto.image' => 'Foto produk harus berupa gambar',
            'foto.mimes' => 'Foto produk harus berupa gambar dengan format jpeg, png, atau jpg',
            'foto.max' => 'Foto produk maksimal berukuran 2 MB',
        ];
    }
}
