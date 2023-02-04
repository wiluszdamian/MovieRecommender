<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function index()
    {
        $client = new Client();
        
        // Get the 5 most popular movies
        $popularMoviesResponse = $client->get('https://api.themoviedb.org/3/movie/popular?api_key=32193d189ceb2101de9ed98317acd250&language=en-US&page=1');
        $popularMovies = json_decode($popularMoviesResponse->getBody(), true)['results'];
        $popularMovies = array_slice($popularMovies, 0, 5);
               
        return view('index', [
            'popularMovies' => $popularMovies
        ]);
    }

    public function show($id)
    {
        $client = new Client();

        // Get information about the movie with the given ID
        $movieResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}?api_key=32193d189ceb2101de9ed98317acd250&language=en-US");
        $movie = json_decode($movieResponse->getBody(), true);

        return view('show', [
            'movie' => $movie
        ]);
    }
}