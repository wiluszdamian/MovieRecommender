<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');
        
        // Get the 5 most popular movies
        $popularMoviesResponse = $client->get("https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}&language=en-US&page=1");
        $popularMovies = json_decode($popularMoviesResponse->getBody(), true)['results'];
        $popularMovies = array_slice($popularMovies, 0, 5);
               
        return view('index', [
            'popularMovies' => $popularMovies
        ]);
    }

    public function show($id)
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');

        // Get information about the movie with the given ID
        $movieResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}&language=en-US");
        $movie = json_decode($movieResponse->getBody(), true);

        // Get actors information in the movie with the given ID
        $actorResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$apiKey}&language=en-US");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        session()->flash('message', 'Post successfully updated.');
        
        return view('pages.show', [
            'movie' => $movie,
            'actors' => $actors,
        ]);

    }
}