<?php

namespace App\Http\Controllers\Account;

use App\Models\UserWatched;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WatchedController extends Controller
{
    public function addMovieToWatched($id)
    {
        return $this->addMediaToWatched($id, 'movie_id', 'add');
    }

    public function addTvToWatched($id)
    {
        return $this->addMediaToWatched($id, 'tv_id', 'add');
    }

    public function removeMovieFromWatched($id)
    {
        return $this->addMediaToWatched($id, 'movie_id', 'remove');
    }

    public function removeTvFromWatched($id)
    {
        return $this->addMediaToWatched($id, 'tv_id', 'remove');
    }

    private function addMediaToWatched($id, $mediaType, $action)
    {
        $user = Auth::user();
        $existingWatched = UserWatched::where('user_id', $user->id)
            ->where($mediaType, $id)
            ->first();

        if ($action === 'add') {
            if ($existingWatched) {
                $message = session()->flash('message', __('message.password_update_error'));
            } else {
                $watched = new UserWatched([
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



