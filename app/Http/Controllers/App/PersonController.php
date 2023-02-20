<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }
    public function show($id)
    {
        $actors = $this->tmdb->getPersonDetails($id);
        $movieCredits = $this->tmdb->getActorMovieCredits($id, count: 6);
        $tvCredits = $this->tmdb->getActorTvCredits($id, count: 6);
        return view('actors.details', [
            'actres' => $actors,
            'actresMovie' => $movieCredits,
            'actresTv' => $tvCredits
        ]);
    }
}
