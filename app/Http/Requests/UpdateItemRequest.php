<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $itemId = $this->route('item') ? $this->route('item')->id : null;

        return [
            'name'        => ['sometimes','required', 'string', 'max:100'],
            // unique except current item
            'code'        => ['sometimes','required', 'string', 'max:50', 'unique:items,code,' . $itemId],
            'category_id' => ['sometimes','required','exists:categories,id'],
            'unit_id'     => ['sometimes','required','exists:units,id'],
            'status'      => ['sometimes','required','in:aktif,rusak,dipinjam,maintenance'],
            'description' => ['nullable', 'string'],
        ];
    }
}
