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

Route::get('/', [API\MovieController::class, 'index']);
Route::get('/movies/{id}', [API\MovieController::class, 'show']);