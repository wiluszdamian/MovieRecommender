<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\UsersProfile;

class IndexController extends Controller
{
    /**
     * The `index` method is responsible for fetching the trending movies, TV series and persons from the past week
     * and returning the view with these data.
     *
     * @return \Illuminate\View\View The view containing the trending movies, TV series and persons data.
     */
    public function index()
    {
        // Fetch trending movies from the past week
        $trendingMovies = getDataFromApi("trending/movie/week")['results'];
        $trendingMovies = array_slice($trendingMovies, 0, 5);

        // Fetch trending TVs from the past week
        $trendingTvs = getDataFromApi("trending/tv/week")['results'];
        $trendingTvs = array_slice($trendingTvs, 0, 5);

        // Fetch trending persons from the past week
        $trendingPerson = getDataFromApi("trending/person/week")['results'];
        $trendingPerson = array_slice($trendingPerson, 0, 5);

        return view('home.index', [
            'popularMovies' => $trendingMovies,
            'popularTvSeries' => $trendingTvs,
            'trendingPersons' => $trendingPerson
        ]);
        dd($trendingPerson);
    }
}