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

        // Get actors information in the movie with the given ID
        $actorResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}/credits?api_key=32193d189ceb2101de9ed98317acd250&language=en-US");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        return view('show', [
            'movie' => $movie,
            'actors' => $actors,
        ]);
    }
}