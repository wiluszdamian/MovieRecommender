<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Models\UsersProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    //TODO: Refactor this ugly code.
    /**
     * Display the user profile page.
     *
     * @return \Illuminate\View\View
     */
//    public function index()
//    {
//        $userId = \Auth::id();
//        $user = User::where('id', $userId)->first();
//        return view('users.profile', compact('user'));
//    }

    /**
     * Update the user profile information.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        try {
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
                'reddit_url' => $request['reddit-url'],
                'twitter_url' => $request['twitter-url'],
                'about_me' => $request['about-me'],
                'country' => $request['country'],
                'city' => $request['city'],
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
