<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignTechnicianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'technicians' => 'required|array|min:1',
            'technicians.*.user_id' => 'required|exists:users,id',
            'technicians.*.role'    => 'nullable|in:leader,helper',
        ];
    }
}
