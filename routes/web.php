<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use App\Models\Movie_User;

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
    
    /*$favorited = array();
    foreach($response->Search as $movie){
        $findId = Movie::where('Title', $movie->Title);
        //dd($findId);
        
        if($findId != null){
            push_array($movie,'btn btn-outline-danger');
        }
        dd($movie);
    }
    dd($favorited);
    */
    return view('dashboard',['movies' => $response->Search]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[MovieController::class,'Showmovies']);
// Route::get('/dashboard',[MovieController::class,'Showmovies']);

Route::post('/search', [MovieController::class,'SearchGuest']);

Route::post('/dashboardsearch',[MovieController::class,'SearchDash']);

Route::post('/favorite',[MovieController::class,'Favorite']);

Route::post('/random',[MovieController::class,'RandomMoviesDash']);
Route::post('/randomguest',[MovieController::class,'RandomMoviesGuest']);