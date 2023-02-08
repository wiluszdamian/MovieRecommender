<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Summary of logout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        session()->flash('message', __('message.logout'));
        return redirect()->route('index');
    }
}
