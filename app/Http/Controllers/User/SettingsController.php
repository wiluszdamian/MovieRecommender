<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.settings');
    }

    public function updateUsername(Request $request)
    {
        $request->validate([
            'username'=>'required|name',
            'currently_password' => 'required',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->currently_password, $user->password)) {
            session()->flash('message', __('message.password_incorrect'));
        } else {
            $user->name = $request->name;
            $user->save();

            session()->flash('message', __('message.successfully_updated'));
        }

        return redirect()->route('settings');
    }

    /**
     * Summary of updateEmail
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
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
