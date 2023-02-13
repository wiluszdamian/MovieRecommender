<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * The `index` method is responsible for returning the actors index view.
     *
     * @return \Illuminate\View\View The actors index view.
     */
    public function index()
    {
        return view('actors.index');
    }

    /**
     * The `details` method is responsible for fetching the details of an actor, their movies and TV series
     * based on the actor ID and returning the view with these data.
     *
     * @param int $id The ID of the actor.
     *
     * @return \Illuminate\View\View The view containing the actor, their movies and TV series data.
     */
    public function details($id)
    {
        // Fetch details from /person/{id}
        $personDetails = getDataFromApi("person/" . $id);

        // Fetch movies from /person/{id}/movie_credits and extracts 'cast' field
        $personMovies = getDataFromApi('person/' . $id . "/movie_credits")['cast'];
        $personMovies = array_slice($personMovies, 0, 8);

        // Fetch tvs from /person/{id}/tv_credits and extracts 'cast' field
        $personTvs = getDataFromApi("person/" . $id . "/tv_credits")['cast'];
        $personTvs = array_slice($personTvs, 0, 8);

        return view('actors.details', [
            'actres' => $personDetails,
            'actresMovie' => $personMovies,
            'actresTv' => $personTvs
        ]);
    }

//TODO: Adding to the list of follow 
// public function save($id)
// {
//
// }
}