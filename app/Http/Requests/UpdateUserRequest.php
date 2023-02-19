<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . auth()->id(),
            'new_password' => 'nullable|string',
            'current_password' => 'nullable|string',
        ];
    }
}
