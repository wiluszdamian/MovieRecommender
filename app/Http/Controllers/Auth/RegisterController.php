<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Summary of register
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmed',
        ]);

        if ($validator->fails()) {
            session()->flash('message', $validator->errors()->first());
            return redirect()->route('register');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];

        session()->flash('message', __('message.successfully_registration'));
        return redirect()->route('index');
    }
}