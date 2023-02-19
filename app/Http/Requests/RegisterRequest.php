<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:users', 'min:6', 'max:56'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'same:password_confirmed'],
        ];
    }
}
