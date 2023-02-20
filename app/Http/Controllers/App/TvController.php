<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class TvController extends Controller
{
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }
    public function show($id)
    {
        $tvs = $this->tmdb->getTVSeriesDetails($id);
        $credits = $this->tmdb->getTvCredits($id, count: 6);
        $recommendations = $this->tmdb->getRecommendations('tv', $id, count: 6);
        return view('tv.details', [
            'tv_series' => $tvs,
            'actors' => $credits,
            'recommendations' => $recommendations
        ]);
    }
}
