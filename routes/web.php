<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\TierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return redirect('/home');
});

Route::resource('/home',CharactersController::class);
Route::get('/tier/checkSlug', [TierController::class, 'checkSlug']);
Route::resource('/tier',TierController::class);
Route::resource('/origin',OriginController::class);
Route::resource('/media',MediaController::class);
