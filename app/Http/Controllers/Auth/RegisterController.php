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
    /**
     * Display the registration form.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Create a new user with the given registration data and send a verification email to them.
     * @param \App\Http\Requests\RegisterRequest $request The HTTP request object containing the user's registration data.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'token' => str_random(40)
            ]);

            Mail::to($user->email)->send(new VerifyEmail($user));

            $token = $user->createToken("Token User: " . $user->name)->accessToken;
            $response = ['token' => $token];

            session()->flash('success', __('message.successfully_registration'));
            return redirect()->route('index');
        } catch (\Exception $e) {
            session()->flash('error', __('message.registration_error') . $e->getMessage());
            return redirect()->back();
        }
    }
}