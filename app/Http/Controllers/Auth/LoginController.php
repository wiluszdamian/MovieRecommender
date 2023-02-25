<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login form.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user using the given credentials and log them in.
     * @param \App\Http\Requests\LoginRequest $request The HTTP request object containing the email and password.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->flash('message', __('message.successfully_login'));
            return redirect()->route('index');
        }

        session()->flash('message', __('message.invalid_data'));
        return redirect()->route('login');
    }
}