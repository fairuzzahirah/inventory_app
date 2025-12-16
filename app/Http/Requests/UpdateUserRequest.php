<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|max:100|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|min:6',
            'role' => 'sometimes|string|max:50',
            'unit_id' => 'nullable|exists:units,id',
        ];
    }
}
