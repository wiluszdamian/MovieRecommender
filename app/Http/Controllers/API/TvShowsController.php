<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TvShowsController extends Controller
{
    public function index()
    {
        $client = new Client();
        
        // Get the 5 most popular TV shows
        $popularTvShowsResponse = $client->get('https://api.themoviedb.org/3/tv/popular?api_key=32193d189ceb2101de9ed98317acd250&language=en-US&page=1');
        $popularTvShows = json_decode($popularTvShowsResponse->getBody(), true)['results'];
        $popularTvShows = array_slice($popularTvShows, 0, 5);
               
        return view('index', [
            'popularTvShows' => $popularTvShows
        ]);
    }
}