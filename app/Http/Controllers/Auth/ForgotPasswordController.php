<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Display the forgot password form.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.forgot');
    }

    /**
     * Send a password reset link to the user's email address.
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse
     */
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
        return redirect()->route('password');
    }

    /**
     * Get the password broker for the controller.
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}