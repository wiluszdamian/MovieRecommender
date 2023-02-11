<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\API;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;

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

Route::get('/', [API\IndexController::class, 'index'])->name('index');
Route::get('/movies', [API\Movie\MovieController::class, 'index'])->name('movies');
Route::get('/movies/{id}', [API\IndexController::class, 'showMovie'])->name('showMovie');
Route::get('/tv-series', [API\TvSerie\TvSerieController::class, 'index'])->name('tv-series');
Route::get('/tv-series/{id}', [API\IndexController::class, 'showTvSeries'])->name('showTvseries');
Route::get('/actors', [API\Actors\ActorController::class, 'index'])->name('actors');
Route::get('/actors/{id}', [API\IndexController::class, 'showActres'])->name('showActres');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
    Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [Auth\RegisterController::class, 'register'])->name('register');
    Route::get('/verify/{token}', [Auth\VerifyController::class, 'verifyUser'])->name('verify');
    Route::get('/forgot', [Auth\ForgotPasswordController::class, 'index'])->name('forgot');
    Route::post('/forgot/reset-password', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [Auth\LogoutController::class, 'logout'])->name('logout');
    Route::get('/profile', [User\UserProfileController::class, 'index'])->name('profile');
    Route::get('/settings', [User\SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/user-update', [User\SettingsController::class, 'update'])->name('settings.user_update');
    Route::post('/settings/profile-update', [User\UserProfileController::class, 'update'])->name('settings.profile_update');
});