<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use App\Http\Controllers\Auth;

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

Route::get('/', [API\MovieController::class, 'index'])->name('index');
Route::get('/movies/{id}', [API\MovieController::class, 'show'])->name('showMovie');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
    Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [Auth\RegisterController::class, 'register'])->name('register');
    Route::get('/verify/{token}', [Auth\VerifyController::class, 'verifyUser'])->name('verify');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [Auth\LogoutController::class, 'logout'])->name('logout');
});