<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    public function index()
    {
        $userId = \Auth::id();
        $userProfile = UsersProfile::where('id', $userId)->first();
        $user = User::where('id', $userId)->first();
        return view('user.settings', compact('userProfile', 'user'));
    }

    public function update(Request $request)
    {
        //TODO: Move validations outside the controller
        //TODO: Add validations in such a way as to avoid SQL Injection

        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'now_password' => 'nullable|string',
            'currently_password' => 'nullable|string',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->currently_password, $user->password)) {
            session()->flash('message', __('message.password_update_error'));
        } else {
            $updateData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['now_password'],
            ];

            foreach ($updateData as $field => $value) {
                if (!$value) {
                    unset($updateData[$field]);
                }
            }
            if (!empty($validatedData['now_password'])) {
                $updateData['password'] = Hash::make($validatedData['now_password']);
            }
            $updateResult = $user->update($updateData);
            session()->flash('message', __('message.update_success'));
        }

        return redirect()->route('settings');
    }
}