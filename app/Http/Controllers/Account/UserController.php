<?php

namespace App\Http\Controllers\Account;

use App\Models\UserFollow;
use App\Models\UserWatched;
use App\Models\UserWatchlist;
use App\Services\TmdbApiService;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $tmdbApiService;

    public function __construct(TmdbApiService $tmdbApiService)
    {
        $this->tmdbApiService = $tmdbApiService;
    }

    /**
     * Display the user settings page.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        return view('users.settings', compact('user'));
    }

    //TODO: Refactor
    public function store()
    {
        $userId = Auth::id();

        // Pobieramy filmy, seriale i aktorów z tabeli user_watcheds
        $watchedMoviesIds = UserWatched::where('user_id', $userId)->pluck('movie_id');
        $watchedTVSeriesIds = UserWatched::where('user_id', $userId)->pluck('tv_id');
        $watchedPersonsIds = UserFollow::where('user_id', $userId)->pluck('person_id');

        // Pobieramy filmy, seriale i aktorów z tabeli user_watchlists
        $watchlistMoviesIds = UserWatchlist::where('user_id', $userId)->pluck('movie_id');
        $watchlistTVSeriesIds = UserWatchlist::where('user_id', $userId)->pluck('tv_id');

        // Tworzymy nowe puste kolekcje dla każdej kategorii
        $watchedMovies = collect();
        $watchedTVSeries = collect();
        $watchedPersons = collect();
        $watchlistMovies = collect();
        $watchlistTVSeries = collect();

        // Pobieramy szczegóły dla każdego filmu, serialu i aktora
        foreach ($watchedMoviesIds as $movieId) {
            $movie = $this->tmdbApiService->getMovieDetails($movieId);
            $watchedMovies->push($movie);
        }

        foreach ($watchedTVSeriesIds as $tvSeriesId) {
            $tvSeries = $this->tmdbApiService->getTVSeriesDetails($tvSeriesId);
            $watchedTVSeries->push($tvSeries);
        }

        foreach ($watchedPersonsIds as $personId) {
            $person = $this->tmdbApiService->getPersonDetails($personId);
            $watchedPersons->push($person);
        }

        foreach ($watchlistMoviesIds as $movieId) {
            $movie = $this->tmdbApiService->getMovieDetails($movieId);
            $watchlistMovies->push($movie);
        }

        foreach ($watchlistTVSeriesIds as $tvSeriesId) {
            $tvSeries = $this->tmdbApiService->getTVSeriesDetails($tvSeriesId);
            $watchlistTVSeries->push($tvSeries);
        }

        // Liczymy sumę w każdej kategorii
        $watchedMoviesCount = $watchedMovies->count();
        $watchedTVSeriesCount = $watchedTVSeries->count();
        $watchedPersonsCount = $watchedPersons->count();
        $watchlistMoviesCount = $watchlistMovies->count();
        $watchlistTVSeriesCount = $watchlistTVSeries->count();
        // Zwracamy widok z danymi
        return view('users.profile', [
            'watchedMovies' => $watchedMovies,
            'watchedTVSeries' => $watchedTVSeries,
            'watchedPersons' => $watchedPersons,
            'watchlistMovies' => $watchlistMovies,
            'watchlistTVSeries' => $watchlistTVSeries,
            'watchedMoviesCount' => $watchedMoviesCount,
            'watchedTVSeriesCount' => $watchedTVSeriesCount,
            'watchedPersonsCount' => $watchedPersonsCount,
            'watchlistMoviesCount' => $watchlistMoviesCount,
            'watchlistTVSeriesCount' => $watchlistTVSeriesCount
        ]);
    }

    /**
     * Update user data based on the given request and redirect to the settings page.
     * @param \Illuminate\Http\Request $request The update user request.
     * @param \App\Services\UserService $userService The user service.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, UserService $userService)
    {
        $user = auth()->user();
        $result = $userService->updateUser($user, $request->all());
        if ($result) {
            session()->flash('success', __('message.update_success'));
        } else {
            session()->flash('error', __('message.password_update_error'));
        }
        return redirect()->route('settings');
    }
}
