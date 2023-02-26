<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserWatched;
use App\Models\UserWatchlist;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    protected $tmdbApiService;

    /**
     * Create a new instance of the controller.
     * @param \App\Services\TmdbApiService $tmdbApiService The TMDb API service to use.
     * @return void
     */
    public function __construct(TmdbApiService $tmdbApiService)
    {
        $this->tmdbApiService = $tmdbApiService;
    }

}
