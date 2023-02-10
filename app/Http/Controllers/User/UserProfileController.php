<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;


class UserProfileController extends Controller
{
    /**
     * Display the user profile settings view.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * Update user profile.
     *
     * Validates the incoming data and updates the user profile with the provided data. If any of the data fields are missing or invalid, returns an error.
     *
     * @param Request $request The incoming HTTP request
     *
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with a success or error message
     */
    public function update(Request $request)
    {
        try {
            //TODO: Move validation from controller to Request class.
            //TODO: JSON response handling 

            $validatedData = $request->validate([
                'reddit-url' => 'nullable|string',
                'twitter-url' => 'nullable|string',
                'avatar-url' => 'nullable|string',
                'about-me' => 'nullable|string',
                'country' => 'nullable|string',
                'city' => 'nullable|string',
            ]);
            $userId = \Auth::id();
            if (!$userId) {
                return response()->json(['message' => 'Error: invalid user id'], 500);
            }
            $userProfile = UserProfile::firstOrCreate([
                'id' => $userId,
            ]);
            if (!$userProfile) {
                return response()->json(['message' => 'Error: unable to create or retrieve user profile'], 500);
            }
            $updateData = [
                'reddit_url' => $validatedData['reddit-url'],
                'twitter_url' => $validatedData['twitter-url'],
                'avatar_url' => $validatedData['avatar-url'],
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
                return response()->json(['message' => 'Error: no data to update'], 500);
            }
            $updateResult = $userProfile->update($updateData);
            if (!$updateResult) {
                return response()->json(['message' => 'Error: unable to update user profile'], 500);
            }
            return response()->json(['message' => 'Profile updated successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}