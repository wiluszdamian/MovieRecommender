<?php

namespace App\Http\Controllers\Account;

use App\Models\UserWatched;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WatchedController extends Controller
{
    public function addMovieToWatched($id)
    {
        return $this->addMediaToWatched($id, 'movie_id');
    }

    public function addTvToWatched($id)
    {
        return $this->addMediaToWatched($id, 'tv_id');
    }

    private function addMediaToWatched($id, $mediaType)
    {
        $user = Auth::user();
        $existingWatched = UserWatched::where('user_id', $user->id)
            ->where($mediaType, $id)
            ->exists();

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

        return redirect()->back()->with($message);
    }
}
