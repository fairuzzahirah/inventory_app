<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        // ganti jadi policy jika diperlukan
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:100'],
            'code'        => ['required', 'string', 'max:50', 'unique:items,code'],
            'category_id' => ['required', 'exists:categories,id'],
            'unit_id'     => ['required', 'exists:units,id'],
            'status'      => ['nullable', 'in:aktif,rusak,dipinjam,maintenance'],
            'description' => ['nullable', 'string'],
        ];
    }
}
