<?php

namespace App\Http\Controllers\Account;

use App\Models\UserWatchlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function addMovieToWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'movie_id');
    }

    public function addTvToWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'tv_id');
    }

    private function addMediaToWatchlist($id, $mediaType)
    {
        $user = Auth::user();
        $existingWatchlist = UserWatchlist::where('user_id', $user->id)
            ->where($mediaType, $id)
            ->exists();

        if ($existingWatchlist) {
            $message = session()->flash('message', __('message.password_update_error'));
        } else {
            $watchlist = new UserWatchlist([
                'user_id' => $user->id,
                $mediaType => $id
            ]);
            $watchlist->save();
            $message = session()->flash('message', __('message.password_update_success'));
        }

        return redirect()->back()->with($message);
    }
}
