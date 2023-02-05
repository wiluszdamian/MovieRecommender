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

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('login', [Auth\AuthController::class, 'index'])->name('login');
Route::post('post-login', [Auth\AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [Auth\AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [Auth\AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [Auth\AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [Auth\AuthController::class, 'dashboard'])->middleware(['auth', 'verify_email']); 
Route::get('account/verify/{token}', [Auth\AuthController::class, 'verifyAccount'])->name('user.verify'); 

/*
|--------------------------------------------------------------------------
| BASE
|--------------------------------------------------------------------------
*/
Route::get('/', [API\MovieController::class, 'index']);
Route::get('/movies/{id}', [API\MovieController::class, 'show']);