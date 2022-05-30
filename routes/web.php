<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
Route::get('/', function () {
    return view('moviepage');
});

Route::get('/dashboard', function () {
    $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s=day&type=movie'));

    return view('dashboard',['movies' => $response->Search]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[MovieController::class,'Showmovies']);
// Route::get('/dashboard',[MovieController::class,'Showmovies']);

Route::post('/search', [MovieController::class,'SearchGuest']);

Route::post('/dashboardsearch',[MovieController::class,'SearchDash']);
Route::post('/dashboard',[MovieController::class,'Favorite']);