<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Log out the authenticated user and invalidate their session.
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        session()->flash('message', __('message.logout'));
        return redirect()->route('index');
    }
}