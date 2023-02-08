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
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyUser(Request $request, $token)
    {

        $verifyUser = User::where('token', $token)->first();

        if (isset($verifyUser)) {
            if (!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = 1;
                $verifyUser->save();
                $status = "Twoje konto zostało pomyślnie zweryfikowane.";
            } else {
                $status = "Twoje konto już zostało zweryfikowane. Możesz się zalogować.";
            }
        } else {
            return response()->json(['error' => "Nieznany użytkownik"], 401);
        }

        return response()->json(['status' => $status], 200);
    }
}