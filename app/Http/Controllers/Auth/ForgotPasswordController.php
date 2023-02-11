<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.forgot');
    }

// public function sendResetLinkEmail(Request $request)
// {
//     $this->validate($request, ['email' => 'required|email']);

//     $response = $this->broker()->sendResetLink(
//         $request->only('email')
//     );

//     if ($response === Password::RESET_LINK_SENT) {
//         return response()->json(['message' => 'Reset link sent to your email']);
//     }

//     return response()->json(['message' => 'Unable to send reset link, please try again']);
// }

// public function broker()
// {
//     return Password::broker();
// }
}