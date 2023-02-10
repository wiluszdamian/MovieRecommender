<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class VerifyController extends Controller
{
    /**
     * Summary of verifyUser
     * @param Request $request
     * @param mixed $token
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function verifyUser(Request $request, $token)
    {

        $verifyUser = User::where('token', $token)->first();

        if (isset($verifyUser)) {
            if (!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = 1;
                $verifyUser->save();
                session()->flash('message', __('message.email_successfully_verified_email'));
            } else {
                session()->flash('message', __('message.email_verified_email'));
            }
        } else {
            session()->flash('message', __('message.email_error_verified'));
        }

        return redirect()->route('index');
    }
}