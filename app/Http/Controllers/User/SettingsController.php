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

    /**
     * Summary of updateUsername
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateUsername(Request $request)
    {
        //TODO: Fix so it works for single updates, fix error display, reorganize controller and rename it
        // $request->validate([
        //     'name'=>'required|string',
        //     'currently_password' => 'required',
        // ]);

        // $user = Auth::user();
        // if (!Hash::check($request->currently_password, $user->password)) {
        //     session()->flash('message', __('message.password_incorrect'));
        // } else {
        //     $user->name = $request->name;
        //     $user->save();

        //     session()->flash('message', __('message.successfully_updated'));
        // }

        // return redirect()->route('settings');
    }


    /**
     * Summary of updateEmail
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateEmail(Request $request)
    {
        // $request->validate([
        //     'email'=>'required|email',
        //     'currently_password' => 'required',
        // ]);

        // $user = Auth::user();
        // if (!Hash::check($request->currently_password, $user->password)) {
        //     session()->flash('message', __('message.password_incorrect'));
        // } else {
        //     $user->email = $request->email;
        //     $user->save();

        //     session()->flash('message', __('message.successfully_updated'));
        // }

        // return redirect()->route('settings');
    }

    /**
     * Summary of updatePassword
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updatePassword(Request $request)
    {
        // $request->validate([
        //     'now_password'=>'required|min:6',
        //     'currently_password' => 'required',
        // ]);

        // $user = Auth::user();
        // if (!Hash::check($request->currently_password, $user->password)) {
        //     session()->flash('message', __('message.password_incorrect'));
        // } else {
        //     $user->password = Hash::make($request->now_password);
        //     $user->save();

        //     session()->flash('message', __('message.successfully_updated'));
        // }

        // return redirect()->route('settings');
    }
}