<?php

namespace App\Http\Controllers\Account;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display the user settings page.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        return view('users.settings', compact('user'));
    }

    /**
     * Store user data and redirect to the user profile page.
     * @return \Illuminate\Contracts\View\View
     */
    public function store()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    /**
     * Update user data based on the given request and redirect to the settings page.
     * @param \Illuminate\Http\Request $request The update user request.
     * @param \App\Services\UserService $userService The user service.
     * @return \Illuminate\Http\RedirectResponse
     */
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