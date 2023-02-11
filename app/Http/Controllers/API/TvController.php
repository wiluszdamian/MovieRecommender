<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TvController extends Controller
{
    public function index()
    {
        return view('tv.index');
    }
}