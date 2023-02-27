<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserWatched;
use App\Models\UserWatchlist;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    protected $tmdbApiService;

    public function __construct(TmdbApiService $tmdbApiService)
    {
        $this->tmdbApiService = $tmdbApiService;
    }

    public function recommendations($userId, $count = 5)
    {
        // pobranie id użytkownika
        $userId = Auth::id();

        // pobranie wszystkich filmów i seriali obejrzanych przez użytkownika
        $watchedMoviesIds = DB::table('user_watcheds')->where('user_id', $userId)->pluck('movie_id')->toArray();
        $watchedTVSeriesIds = DB::table('user_watcheds')->where('user_id', $userId)->pluck('tv_id')->toArray();

        // pobranie wszystkich filmów i seriali dodanych do listy "Do obejrzenia" przez użytkownika
        $watchlistMoviesIds = DB::table('user_watchlists')->where('user_id', $userId)->pluck('movie_id')->toArray();
        $watchlistTVSeriesIds = DB::table('user_watchlists')->where('user_id', $userId)->pluck('tv_id')->toArray();

        // pobranie wszystkich aktorów obserwowanych przez użytkownika
        $followedActorsIds = DB::table('user_follows')->where('user_id', $userId)->pluck('person_id')->toArray();

        // pobranie informacji o filmach i serialach obejrzanych przez użytkownika
        $watchedMovies = collect([]);
        foreach ($watchedMoviesIds as $movieId) {
            $movieDetails = $this->tmdbApiService->getMovieDetails($movieId);
            $watchedMovies->push($movieDetails);
        }

        $watchedTVSeries = collect([]);
        foreach ($watchedTVSeriesIds as $tvSeriesId) {
            $tvSeriesDetails = $this->tmdbApiService->getTVSeriesDetails($tvSeriesId);
            $watchedTVSeries->push($tvSeriesDetails);
        }

        // pobranie informacji o filmach i serialach dodanych do listy "Do obejrzenia" przez użytkownika
        $watchlistMovies = collect([]);
        foreach ($watchlistMoviesIds as $movieId) {
            $movieDetails = $this->tmdbApiService->getMovieDetails($movieId);
            $watchlistMovies->push($movieDetails);
        }

        $watchlistTVSeries = collect([]);
        foreach ($watchlistTVSeriesIds as $tvSeriesId) {
            $tvSeriesDetails = $this->tmdbApiService->getTVSeriesDetails($tvSeriesId);
            $watchlistTVSeries->push($tvSeriesDetails);
        }

        // pobranie informacji o aktorach obserwowanych przez użytkownika
        $followedActors = collect([]);
        foreach ($followedActorsIds as $actorId) {
            $actorDetails = $this->tmdbApiService->getPersonDetails($actorId);
            $followedActors->push($actorDetails);
        }

// pobranie informacji o filmach i serialach z TMDB API
        $allMovies = collect([]);
        for ($i = 1; $i <= 5; $i++) { // pobranie 5 stron filmów
            $moviesPage = $this->tmdbApiService->getMovies();
            $allMovies = $allMovies->merge($moviesPage['results']);
        }

        $allTVSeries = collect([]);
        for ($i = 1; $i <= 5; $i++) { // pobranie 5 stron seriali
            $tvSeriesPage = $this->tmdbApiService->getTVSeries($i);
            $allTVSeries = $allTVSeries->merge($tvSeriesPage['results']);
        }

// wyfiltrowanie filmów i seriali, które użytkownik już obejrzał lub dodał do listy "Do obejrzenia"
        $unwatchedMovies = $allMovies->reject(function ($movie) use ($watchedMovies, $watchlistMovies) {
            return $watchedMovies->contains('id', $movie['id']) || $watchlistMovies->contains('id', $movie['id']);
        });

        $unwatchedTVSeries = $allTVSeries->reject(function ($tvSeries) use ($watchedTVSeries, $watchlistTVSeries) {
            return $watchedTVSeries->contains('id', $tvSeries['id']) || $watchlistTVSeries->contains('id', $tvSeries['id']);
        });

// wyfiltrowanie filmów i seriali, w których grali aktorzy obserwowani przez użytkownika
        $recommendedMovies = $unwatchedMovies;
        $recommendedTVSeries = $unwatchedTVSeries;

// zwrócenie rekomendacji filmów i seriali
        $recommendations = $recommendedMovies->merge($recommendedTVSeries)->toArray();
        $recommendations = $recommendations::all();
        return view('users.recommendations', compact('recommendations'));
    }
}
