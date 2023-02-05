<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function HandleLogin(Request $request)
    {
        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials))
        {
            return redirect()->route('home');
        }

        session()->flash('message', 'Invalid Credentials');
        session()->flash('type', 'danger');

        return redirect()->back();
    }
}
