<?php

namespace App\Http\Controllers\Account;

use App\Models\UserWatchlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function addMovieToWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'movie_id', 'add');
    }

    public function addTvToWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'tv_id', 'add');
    }

    public function removeMovieFromWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'movie_id', 'remove');
    }

    public function removeTvFromWatchlist($id)
    {
        return $this->addMediaToWatchlist($id, 'tv_id', 'remove');
    }

    private function addMediaToWatchlist($id, $mediaType, $action)
    {
        $user = Auth::user();
        $existingWatched = UserWatchlist::where('user_id', $user->id)
            ->where($mediaType, $id)
            ->first();

        if ($action === 'add') {
            if ($existingWatched) {
                $message = session()->flash('message', __('message.password_update_error'));
            } else {
                $watched = new UserWatchlist([
                    'user_id' => $user->id,
                    $mediaType => $id
                ]);
                $watched->save();
                $message = session()->flash('message', __('message.password_update_success'));
            }
        } elseif ($action === 'remove') {
            if ($existingWatched) {
                $existingWatched->delete();
                $message = session()->flash('message', __('message.password_delete_success'));
            } else {
                $message = session()->flash('message', __('message.password_delete_error'));
            }
        } else {
            $message = session()->flash('message', __('message.unknown_action'));
        }

        return redirect()->back()->with($message);
    }
}
