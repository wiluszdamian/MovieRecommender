<?php

namespace App\Http\Controllers\API\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return view('pages.actors.actor');
    }
}