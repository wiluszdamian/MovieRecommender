<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\User;


class UserProfileController extends Controller
{

    /**
     * Display the user profile information.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = \Auth::id();
        $userProfile = UsersProfile::where('id', $userId)->first();
        $user = User::where('id', $userId)->first();
        return view('user.profile', compact('userProfile', 'user'));
    }

    /**
     * Update the user profile information.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            //TODO: Move validations outside the controller
            //TODO: Add validations in such a way as to avoid SQL Injection

            $validatedData = $request->validate([
                'reddit-url' => 'nullable|string',
                'twitter-url' => 'nullable|string',
                'about-me' => 'nullable|string|max:255',
                'country' => 'nullable|string',
                'city' => 'nullable|string',
            ]);

            $userId = \Auth::id();

            if (!$userId) {
                session()->flash('message', __('message.invalid_user_id'));
            }

            $userProfile = UsersProfile::firstOrCreate([
                'id' => $userId,
            ]);

            if (!$userProfile) {
                session()->flash('message', __('message.unable_create'));
            }

            $updateData = [
                'reddit_url' => $validatedData['reddit-url'],
                'twitter_url' => $validatedData['twitter-url'],
                'about_me' => $validatedData['about-me'],
                'country' => $validatedData['country'],
                'city' => $validatedData['city'],
            ];

            foreach ($updateData as $field => $value) {
                if (!$value) {
                    unset($updateData[$field]);
                }
            }

            if (!$updateData) {
                session()->flash('message', __('message.no_data_to_update'));
            } else {
                $updateResult = $userProfile->update($updateData);

                if (!$updateResult) {
                    session()->flash('message', __('message.unable_to_update_user_profile'));
                }

                session()->flash('message', __('message.update_success'));
            }

        } catch (\Exception $e) {
            session()->flash('message', __('message.error') . $e->getMessage());
        }
        return redirect()->route('settings');
    }
}