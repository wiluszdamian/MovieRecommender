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
Route::get('/movies', [App\MovieController::class, 'index'])->name('movies');
Route::get('/movies/{id}', [App\MovieController::class, 'details'])->name('movies.details');
Route::get('/tv-series', [App\TvController::class, 'index'])->name('tv');
Route::get('/tv-series/{id}', [App\TvController::class, 'details'])->name('tv.details');
Route::get('/actors', [App\PersonController::class, 'index'])->name('actors');
Route::get('/actors/{id}', [App\PersonController::class, 'details'])->name('person.details');
Route::get('/language/{locale}', [App\LanguageController::class, 'changeLanguage'])->name('language');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
    Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [Auth\RegisterController::class, 'register'])->name('register');
    Route::get('/verify/{token}', [Auth\VerifyController::class, 'verifyUser'])->name('verify');
    Route::get('/forgot', [Auth\ForgotPasswordController::class, 'index'])->name('password');
    Route::post('/forgot/reset-password', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [Auth\LogoutController::class, 'logout'])->name('logout');
    Route::get('/profile', [Account\ProfileController::class, 'index'])->name('profile');
    Route::get('/settings', [Account\UserController::class, 'index'])->name('settings');
    Route::post('/settings/user-update', [Account\UserController::class, 'update'])->name('user.update');
    Route::post('/settings/profile-update', [Account\ProfileController::class, 'update'])->name('profile.update');
    Route::post('/add-to-watched', [App\MovieController::class, 'save'])->name('movie.watched');
});