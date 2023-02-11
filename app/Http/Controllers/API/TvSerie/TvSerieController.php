<?php

namespace App\Http\Controllers\API\TvSerie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TvSerieController extends Controller
{
    public function index()
    {
        return view('pages.tv-series.tvserie');
    }
}