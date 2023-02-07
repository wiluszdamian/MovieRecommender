<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'currently_password' => 'required',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->currently_password, $user->password)) {
            session()->flash('message', __('message.password_incorrect'));
        } else {
            $user->email = $request->email;
            $user->save();

            session()->flash('message', __('message.successfully_updated'));
        }
        return redirect()->route('settings');
    }
}
