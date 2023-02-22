<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait MediaControllerTrait
{
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
}
