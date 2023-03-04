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

    public function index()
    {
        $userId = Auth::id();

        $watchedMoviesIds = $this->getWatchedMoviesIds($userId);
        $watchedTVSeriesIds = $this->getWatchedTVSeriesIds($userId);
        $watchlistMoviesIds = $this->getWatchlistMoviesIds($userId);
        $watchlistTVSeriesIds = $this->getWatchlistTVSeriesIds($userId);
        $followedActorsIds = $this->getFollowedActorsIds($userId);

        $watchedMovies = $this->getMovies($watchedMoviesIds);
        $watchedTVSeries = $this->getTVSeries($watchedTVSeriesIds);
        $watchlistMovies = $this->getMovies($watchlistMoviesIds);
        $watchlistTVSeries = $this->getTVSeries($watchlistTVSeriesIds);
        $followedActors = $this->getFollowedActors($followedActorsIds);

        $allMovies = collect([]);
        $moviesPage = $this->tmdbApiService->getMovies();
        $allMovies = $allMovies->merge($moviesPage['results']);

        $allTVSeries = collect([]);
        $tvSeriesPage = $this->tmdbApiService->getTVSeries();
        $allTVSeries = $allTVSeries->merge($tvSeriesPage['results']);

        $unwatchedMovies = $this->getUnwatchedMovies($allMovies, $watchedMovies, $watchlistMovies);
        $unwatchedTVSeries = $this->getUnwatchedTVSeries($allTVSeries, $watchedTVSeries, $watchlistTVSeries);

        $recommendedMovies = $unwatchedMovies;
        $recommendedTVSeries = $unwatchedTVSeries;

        $recommendations = $recommendedMovies->merge($recommendedTVSeries)->toArray();

        return view('users.recommendations', compact('recommendations'));
    }

    private function getMovies($movieIds)
    {
        $movies = collect([]);

        foreach ($movieIds as $movieId) {
            $movieDetails = $this->tmdbApiService->getMovieDetails($movieId);
            $movies->push($movieDetails);
        }

        return $movies;
    }

    private function getTVSeries($tvSeriesIds)
    {
        $tvSeries = collect([]);

        foreach ($tvSeriesIds as $tvSeriesId) {
            $tvSeriesDetails = $this->tmdbApiService->getTVSeriesDetails($tvSeriesId);
            $tvSeries->push($tvSeriesDetails);
        }

        return $tvSeries;
    }

    private function getWatchedMoviesIds($userId)
    {
        return DB::table('user_watcheds')->where('user_id', $userId)->pluck('movie_id')->toArray();
    }

    private function getWatchedTVSeriesIds($userId)
    {
        return DB::table('user_watcheds')->where('user_id', $userId)->pluck('tv_id')->toArray();
    }

    private function getWatchlistMoviesIds($userId)
    {
        return DB::table('user_watchlists')->where('user_id', $userId)->pluck('movie_id')->toArray();
    }

    private function getWatchlistTVSeriesIds($userId)
    {
        return DB::table('user_watchlists')->where('user_id', $userId)->pluck('tv_id')->toArray();
    }

    private function getFollowedActorsIds($userId)
    {
        return DB::table('user_follows')->where('user_id', $userId)->pluck('person_id')->toArray();
    }

    private function getFollowedActors($actorIds)
    {
        $actors = collect([]);

        foreach ($actorIds as $actorId) {
            $actorDetails = $this->tmdbApiService->getPersonDetails($actorId);
            $actors->push($actorDetails);
        }

        return $actors;
    }

    private function getUnwatchedMovies($allMovies, $watchedMovies, $watchlistMovies)
    {
        return $allMovies->reject(function ($movie) use ($watchedMovies, $watchlistMovies) {
            return $watchedMovies->contains('id', $movie['id']) || $watchlistMovies->contains('id', $movie['id']);
        });
    }

    private function getUnwatchedTVSeries($allTVSeries, $watchedTVSeries, $watchlistTVSeries)
    {
        return $allTVSeries->reject(function ($tvSeries) use ($watchedTVSeries, $watchlistTVSeries) {
            return $watchedTVSeries->contains('id', $tvSeries['id']) || $watchlistTVSeries->contains('id', $tvSeries['id']);
        });
    }
}


