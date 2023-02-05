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
Route::get('/user-register', [Auth\RegisterController::class,'index'])->name('register');
Route::get('/user-register', [Auth\RegisterController::class,'HandleRegister']);
Route::get('/user-login', [Auth\LoginController::class,'index'])->name('login');
Route::get('/user-login', [Auth\LoginController::class,'HandleLogin']);
Route::get('/verify/{token}', [Auth\VerifyController::class,'VerifyEmail'])->name('verify');


/*
|--------------------------------------------------------------------------
| BASE
|--------------------------------------------------------------------------
*/
Route::get('/', [API\MovieController::class, 'index']);
Route::get('/movies/{id}', [API\MovieController::class, 'show']);