<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyController extends Controller
{
    public function verifyUser(Request $request, $token)
    {
        $verifyUser = User::where('token', $token)->first();

        if (isset($verifyUser)) {
            if (!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = 1;
                $verifyUser->save();
                session()->flash('success', __('message.email_successfully_verified_email'));
            } else {
                session()->flash('success', __('message.email_verified_email'));
            }
        } else {
            session()->flash('error', __('message.email_error_verified'));
        }

        return redirect()->route('index');
    }
}