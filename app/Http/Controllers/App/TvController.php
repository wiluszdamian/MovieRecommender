<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * The `index` method is responsible for returning the TV series index view.
     *
     * @return \Illuminate\View\View The TV series index view.
     */
    public function index()
    {
        return view('tv.index');
    }

    /**
     * The `details` method is responsible for fetching the details of a TV series, its actors and recommendations
     * based on the TV series ID and returning the view with these data.
     *
     * @param int $id The ID of the TV series.
     *
     * @return \Illuminate\View\View The view containing the TV series, actors and recommendations data.
     */
    public function details($id)
    {
        // Fetch details from /tv/{id}
        $tvDetails = getDataFromApi("tv/" . $id);

        // Fetch actors from /tv/{id}/credits and extracts 'cast' field
        $actorDetails = getDataFromApi("tv/" . $id . "/credits")['cast'];
        $actorDetails = array_slice($actorDetails, 0, 8);

        // Fetch recommendatios from /tv/{id}/recommendations and extracts 'results' field
        $recommendationDetails = getDataFromApi("tv/" . $id . "/recommendations")['results'];
        $recommendationDetails = array_slice($recommendationDetails, 0, 8);

        return view('tv.details', [
            'tv_series' => $tvDetails,
            'actors' => $actorDetails,
            'recommendations' => $recommendationDetails
        ]);
    }

//TODO: Adding to the list of watched tvs
// public function save()
// {
//
// }
}