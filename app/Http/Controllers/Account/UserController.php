<?php

namespace App\Http\Controllers\Account;

use App\Services\UserService;
use App\Http\Controllers\Controller;
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
