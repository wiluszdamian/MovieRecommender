<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * Create a new instance of the controller.
     * @param \App\Services\TmdbApiService $tmdb The TMDb API service to use.
     * @return void
     */
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    /**
     * Display the details page for a TV series.
     * @param int $id The ID of the TV series to display details for.
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $tvs = $this->tmdb->getTVSeriesDetails($id);
        $credits = $this->tmdb->getTvCredits($id, count: 15);
        $recommendations = $this->tmdb->getRecommendations('tv', $id, count: 15);
        return view('tv.details', [
            'tv_series' => $tvs,
            'actors' => $credits,
            'recommendations' => $recommendations
        ]);
    }
}