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

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $this->validate($request, ['email' => 'required|email']);

            $response = $this->broker()->sendResetLink(
                $request->only('email')
            );

            if ($response === Password::RESET_LINK_SENT) {
                session()->flash('message', __('message.reset_link_sent'));
            }
        } catch (\Exception $e) {
            session()->flash('message', __('message.error') . $e->getMessage());
        }
        return redirect()->route('forgot');
    }

    public function broker()
    {
        return Password::broker();
    }
}