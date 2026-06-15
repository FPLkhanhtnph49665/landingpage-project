<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string',
            'status' => 'nullable|in:active,archived,sponsored',
        ];
    }
}
