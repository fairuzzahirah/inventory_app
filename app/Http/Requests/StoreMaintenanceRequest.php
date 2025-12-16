<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // dibatasi via Policy
    }

    public function rules(): array
    {
        return [
            'item_id'     => 'required|exists:items,id',
            'priority'    => 'required|in:low,medium,high',
            'description' => 'required|string|max:1000',
        ];
    }
}
