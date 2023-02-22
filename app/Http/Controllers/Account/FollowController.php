<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Traits\MediaControllerTrait;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    use MediaControllerTrait;

    public function followActor($id)
    {
        return $this->addUserFollows($id, 'add');
    }

    public function unfollowActor($id)
    {
        return $this->addUserFollows($id, 'remove');
    }

}
