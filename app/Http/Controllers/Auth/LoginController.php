<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)) {
            session()->flash('message', __('message.successfully_login'));
            return redirect()->route('index');
        }

        session()->flash('message', __('message.invalid_data'));
        return redirect()->route('login');
    }
}
