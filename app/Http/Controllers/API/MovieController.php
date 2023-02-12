<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * The `index` method is responsible for returning the movies index view.
     *
     * @return \Illuminate\View\View The movies index view.
     */
    public function index()
    {
        return view('movies.index');
    }

    /**
     * The `details` method is responsible for fetching the details of movies, its actors and recommendations
     * based on the movies ID and returning the view with these data.
     *
     * @param int $id The ID of the movies.
     *
     * @return \Illuminate\View\View The view containing the movies, actors and recommendations data.
     */
    public function details($id)
    {
        // Fetch details from /movie/{id}
        $movieDetails = getDataFromApi("movie/" . $id);

        // Fetch actors from /movie/{id}/credits and extracts 'cast' field
        $actorDetails = getDataFromApi("movie/" . $id . "/credits")['cast'];
        $actorDetails = array_slice($actorDetails, 0, 8);

        // Fetch recommendations from /movie/{id}/recommendations and exctracts 'results' field
        $recommendationDetails = getDataFromApi("movie/" . $id . "/recommendations")['results'];
        $recommendationDetails = array_slice($recommendationDetails, 0, 8);

        return view('movies.details', [
            'movie' => $movieDetails,
            'actors' => $actorDetails,
            'recommendations' => $recommendationDetails
        ]);
    }

//TODO: Adding to the list of watched movies
// public function save($id)
// {
//     $userId = \Auth::id();
//     $movie = $id;
//     $genre = $genre = $movie['genre'];

//     \DB::table('users_watched')->insert([
//         'user_id' => $userId,
//         'movie_id' => $id,
//         'genre' => $genre
//     ]);

//     return redirect()->back()->with('success', 'Movie saved successfully');
// }
}