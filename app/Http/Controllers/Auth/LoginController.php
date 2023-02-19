<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

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
