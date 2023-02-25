<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Traits\MediaControllerTrait;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    use MediaControllerTrait;

    /**
     * Follow an actor and redirect back with a message.
     * @param int $id The ID of the actor to follow.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function followActor($id)
    {
        return $this->addUserFollows($id, 'add');
    }

    /**
     * Unfollow an actor and redirect back with a message.
     * @param int $id The ID of the actor to unfollow.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollowActor($id)
    {
        return $this->addUserFollows($id, 'remove');
    }
}