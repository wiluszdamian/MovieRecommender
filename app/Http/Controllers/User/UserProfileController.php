<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;


class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        // try {
        //     $validatedData = $request->validate([
        //         'reddit-url' => 'required|string',
        //         'twitter-url' => 'string',
        //         'avatar-url' => 'string',
        //         'about-me' => 'string',
        //         'country' => 'string',
        //         'city' => 'string',
        //     ]);
    
        //     $userProfile = UserProfile::firstOrCreate([
        //         'user_id' => \Auth::id(),
        //     ]);
    
        //     $userProfile->update([
        //         'reddit_url' => $validatedData['reddit-url'],
        //         'twitter_url' => $validatedData['twitter-url'],
        //         'avatar_url' => $validatedData['avatar-url'],
        //         'about_me' => $validatedData['about-me'],
        //         'country' => $validatedData['country'],
        //         'city' => $validatedData['city'],
        //     ]);
    
        //     return redirect()->back()->with('message', 'Profile updated successfully!');
        // } catch (\Exception $e){
        //     return redirect()->back()->withErrors(['message' => 'Profile update error!']);
        // }
    }
}
