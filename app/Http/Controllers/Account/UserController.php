<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Models\UsersProfile;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('users.settings', compact('user'));
    }

    public function store()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function update(UpdateUserRequest $request, UserService $userService)
    {
        $user = auth()->user();
        $result = $userService->updateUser($user, $request->all());
        if ($result) {
            session()->flash('message', __('message.update_success'));
        } else {
            session()->flash('message', __('message.password_update_error'));
        }
        return redirect()->route('settings');
    }
}
