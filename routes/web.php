<?php

use App\Http\Controllers\App;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Account;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/movies/{id}', [App\MovieController::class, 'show'])->name('movie');
Route::get('/tv-series/{id}', [App\TvController::class, 'show'])->name('tvSerie');
Route::get('/actors/{id}', [App\PersonController::class, 'show'])->name('person.details');
Route::get('/search', [App\SearchController::class, 'search'])->name('search');

Route::middleware(['guest'])->group(function () {
    // Account
    Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'store'])->name('login');
    Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [Auth\RegisterController::class, 'store'])->name('register');
    Route::get('/verify/{token}', [Auth\VerifyController::class, 'verifyUser'])->name('verify');
    Route::get('/forgot', [Auth\ForgotPasswordController::class, 'index'])->name('password');
    Route::post('/forgot/reset-password', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    // Account
    Route::get('/logout', [Auth\LogoutController::class, 'logout'])->name('logout');
    Route::get('/account', [Account\UserController::class, 'store'])->name('profile');
    Route::get('/settings', [Account\UserController::class, 'index'])->name('settings');
    Route::get('/recommendations', [Account\RecommendationController::class, 'index'])->name('recommendation');
    Route::post('/settings/update', [Account\UserController::class, 'update'])->name('user.update');

    // Watchlist
    Route::post('/movies/{id}/watchlist-add', [Account\WatchlistController::class, 'addMovieToWatchlist'])->name('movie.add.watchlist');
    Route::post('/tv/{id}/watchlist-add', [Account\WatchlistController::class, 'addTvToWatchlist'])->name('tv.add.watchlist');
    Route::delete('/movies/{id}/watchlist-remove', [Account\WatchlistController::class, 'removeMovieFromWatchlist'])->name('movie.remove.watchlist');
    Route::delete('/tv/{id}/watchlist-remove', [Account\WatchlistController::class, 'removeTvFromWatchlist'])->name('tv.remove.watchlist');

    // Watched
    Route::post('/movies/{id}/watched-add', [Account\WatchedController::class, 'addMovieToWatched'])->name('movie.add.watched');
    Route::post('/tv/{id}/watched-add', [Account\WatchedController::class, 'addTvToWatched'])->name('tv.add.watched');
    Route::delete('/movies/{id}/watched-remove', [Account\WatchedController::class, 'removeMovieFromWatched'])->name('movie.remove.watched');
    Route::delete('/tv/{id}/watched-remove', [Account\WatchedController::class, 'removeTvFromWatched'])->name('tv.remove.watched');

    // Actors
    Route::post('/actors/{id}/follow', [Account\FollowController::class, 'followActor'])->name('actor.follow');
    Route::post('/actors/{id}/unfollow', [Account\FollowController::class, 'unfollowActor'])->name('actor.unfollow');
});
