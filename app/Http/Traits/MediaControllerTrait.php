<?php
namespace App\Http\Traits;

use App\Models\UserFollow;
use Illuminate\Support\Facades\Auth;

trait MediaControllerTrait
{
    // TODO: Add langs

    /**
     * Add media to a given model and redirect back with a message.
     * @param string $model The name of the model to add media to.
     * @param int $id The ID of the media to add.
     * @param string $mediaType The type of media to add.
     * @param string $action The action to perform ('add' or 'remove').
     * @return \Illuminate\Http\RedirectResponse
     */
    private function addMediaTo($model, $id, $mediaType, $action)
    {
        $user = Auth::user();
        $existingMedia = $model::where('user_id', $user->id)
            ->where($mediaType, $id)
            ->first();

        if ($action === 'add') {
            if ($existingMedia) {
                $message = session()->flash('message', __('message.password_update_error'));
            } else {
                $media = new $model([
                    'user_id' => $user->id,
                    $mediaType => $id
                ]);
                $media->save();
                $message = session()->flash('message', __('message.password_update_success'));
            }
        } elseif ($action === 'remove') {
            if ($existingMedia) {
                $existingMedia->delete();
                $message = session()->flash('message', __('message.password_delete_success'));
            } else {
                $message = session()->flash('message', __('message.password_delete_error'));
            }
        } else {
            $message = session()->flash('message', __('message.unknown_action'));
        }

        return redirect()->back()->with($message);
    }

    /**
     * Add or remove a user follow and redirect back with a message.
     * @param int $id The ID of the user to follow/unfollow.
     * @param string $action The action to perform ('add' or 'remove').
     * @return \Illuminate\Http\RedirectResponse
     */
    private function addUserFollows($id, $action)
    {
        $user = Auth::user();
        $existingFollow = UserFollow::where('user_id', $user->id)
            ->where('person_id', $id)
            ->first();

        if ($action === 'add') {
            if ($existingFollow) {
                $message = session()->flash('message', __('message.password_update_error'));
            } else {
                $follow = new UserFollow([
                    'user_id' => $user->id,
                    'person_id' => $id
                ]);
                $follow->save();
                $message = session()->flash('message', __('message.password_update_success'));
            }
        } elseif ($action === 'remove') {
            if ($existingFollow) {
                $existingFollow->delete();
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