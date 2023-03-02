<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserReview;
use App\Models\UserWatched;
use App\Models\UserWatchlist;
use App\Services\TmdbApiService;
use GuzzleHttp\Client;
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

    public function index($userId, $count = 5)
    {
        $userId = Auth::id();

        $watchedMoviesIds = DB::table('user_watcheds')->where('user_id', $userId)->pluck('movie_id')->toArray();
        $watchedTVSeriesIds = DB::table('user_watcheds')->where('user_id', $userId)->pluck('tv_id')->toArray();

        $watchlistMoviesIds = DB::table('user_watchlists')->where('user_id', $userId)->pluck('movie_id')->toArray();
        $watchlistTVSeriesIds = DB::table('user_watchlists')->where('user_id', $userId)->pluck('tv_id')->toArray();

        $followedActorsIds = DB::table('user_follows')->where('user_id', $userId)->pluck('person_id')->toArray();

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

        $followedActors = collect([]);
        foreach ($followedActorsIds as $actorId) {
            $actorDetails = $this->tmdbApiService->getPersonDetails($actorId);
            $followedActors->push($actorDetails);
        }

        $allMovies = collect([]);
        for ($i = 1; $i <= 1; $i++) {
            $moviesPage = $this->tmdbApiService->getMovies();
            $allMovies = $allMovies->merge($moviesPage['results']);
        }

        $allTVSeries = collect([]);
        for ($i = 1; $i <= 1; $i++) {
            $tvSeriesPage = $this->tmdbApiService->getTVSeries($i);
            $allTVSeries = $allTVSeries->merge($tvSeriesPage['results']);
        }

        $unwatchedMovies = $allMovies->reject(function ($movie) use ($watchedMovies, $watchlistMovies) {
            return $watchedMovies->contains('id', $movie['id']) || $watchlistMovies->contains('id', $movie['id']);
        });

        $unwatchedTVSeries = $allTVSeries->reject(function ($tvSeries) use ($watchedTVSeries, $watchlistTVSeries) {
            return $watchedTVSeries->contains('id', $tvSeries['id']) || $watchlistTVSeries->contains('id', $tvSeries['id']);
        });

        $recommendedMovies = $unwatchedMovies;
        $recommendedTVSeries = $unwatchedTVSeries;

        $recommendations = $recommendedMovies->merge($recommendedTVSeries)->toArray();
        return view('users.recommendations', compact('recommendations'));
    }
}


