<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return view('actors.index');
    }
}