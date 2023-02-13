<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Models\UsersProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    //TODO: Refactor this ugly code.
    /** 
     * Show the user settings page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userId = \Auth::id();
        $userProfile = UsersProfile::where('id', $userId)->first();
        $user = User::where('id', $userId)->first();
        return view('users.settings', compact('userProfile', 'user'));
    }

    /**
     * Update the user information.
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->currently_password, $user->password)) {
            session()->flash('message', __('message.password_update_error'));
        } else {
            $updateData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('now_password'),
            ];

            foreach ($updateData as $field => $value) {
                if (!$value) {
                    unset($updateData[$field]);
                }
            }
            if (!empty($request->input('now_password'))) {
                $updateData['password'] = Hash::make($request->input('now_password'));
            }
            $updateResult = $user->update($updateData);
            session()->flash('message', __('message.update_success'));
        }

        return redirect()->route('settings');
    }
}