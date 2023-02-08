<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.login');
    }
    
    /**
     * Summary of login
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            session()->flash('message', $validator->errors()->first());
            return redirect()->route('login');
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            session()->flash('message', __('message.successfully_login'));
            return redirect()->route('index');
        } else {
            session()->flash('message', __('message.invalid_data'));
            return redirect()->route('login');
        }
    }
}