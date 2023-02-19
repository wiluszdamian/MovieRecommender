<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\VerifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'token'=>str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));

        $token = $user->createToken("Token User: " . $user->name)->accessToken;
        $response = ['token' => $token];

        session()->flash('message', __('message.successfully_registration'));
        return redirect()->route('index');
    }
}
