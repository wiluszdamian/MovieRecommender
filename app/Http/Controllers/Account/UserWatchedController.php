<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\UserWatched;
use Illuminate\Http\Request;

class UserWatchedController extends Controller
{
    //TODO: Refactor this ugly code.
    public function store(Request $request)
    {
        try {
            $movie = session()->get('movie');

            $userId = \Auth::id();
            $movieId = $movie['id'];
            $movieGenre = $movie['genres'];

            $userWatched = UserWatched::firstOrCreate([
                'id' => $userId,
            ]);

            if (!$userWatched) {
                session()->flash('message', __('message.unable_create'));
            }


            $updateData = [
                'movie_id' => $movieId,
                'movie_genre' => $movieGenre,
                'viewed' => 1,
            ];
        } catch (\Exception $e) {
            session()->flash('message', __('message.error') . $e->getMessage());
        }

        return redirect()->route('movies');
    }
}