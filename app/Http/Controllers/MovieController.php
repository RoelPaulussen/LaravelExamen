<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Movie_User;

class MovieController extends Controller
{
    //
    public function Showmovies(){
    
        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s=day&type=movie'));
        //dd($response->Search);
        return view('moviepage',['movies' => $response->Search]);
    }
    
    public function Favorite(Request $request){
        //dd($favorite->input('Title'));
        //dd(auth()->user()->id);
        $movie = Movie::firstOrCreate(
            ['Title' => $request->input('Title')],
            [ 
            'Title' => $request->input('Title'),
            'Year' => $request->input('Year'), 
            'Poster' => $request->input('Poster')
        ]);
        $newFavorite = Movie_User::firstOrCreate(
            ['movie_id' => $movie->id,
             'user_id' => auth()->user()->id
            ],
            ['movie_id' => $movie->id,
            'user_id' => auth()->user()->id 
        ]);

        if($newFavorite->wasRecentlyCreated){
            $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s=day&type=movie'));
            return view('dashboard',['movies' => $response->Search]);;
        }
        else{
            $newFavorite->delete();
            $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s=day&type=movie'));
            return view('dashboard',['movies' => $response->Search]);;
        }
    }

    public function SearchGuest(Request $wanted){
        //dd($wanted->input('wanted'));
        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$wanted->input('wanted').'&type=movie'));
        
        return view('moviepage',['movies' => $response->Search]);
    }
    public function SearchDash(Request $wanted){
        //dd($wanted);
        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$wanted->input('wanted').'&type=movie'));
    
        return view('dashboard',['movies' => $response->Search]);
    }
    
    public function RandomMoviesDash(Request $request){
 
        $file = Storage::get('words.txt');
        //dd(preg_split('/\r\n|\r|\n/',$file));
        $file_arr = preg_split('/\r\n|\r|\n/',$file);
        //dd($file_arr);
        $num_lines = count($file_arr);
        //dd($num_lines);
        $last_arr_index = $num_lines - 1;
        $rand_index = rand(0, $last_arr_index);
        $rand_text = $file_arr[$rand_index];

        //dd($rand_text);
        /* TEST TO CHECK IF WORDS ARE SEARCHABLE
        $testarr = array();
        foreach($file_arr as $word){
            $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$word.'&type=movie'));
            if($response->Response === "False"){
                array_push($testarr,$word);
            }
        }
        dd($testarr);
        */

        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$rand_text.'&type=movie'));
        //dd($response, $rand_text);
        return view('dashboard',['movies' => $response->Search]);
    }
    public function RandomMoviesGuest(Request $request){
        $file = Storage::get('words.txt');
        //dd(preg_split('/\r\n|\r|\n/',$file));
        $file_arr = preg_split('/\r\n|\r|\n/',$file);
        //dd($file_arr);
        $num_lines = count($file_arr);
        //dd($num_lines);
        $last_arr_index = $num_lines - 1;
        $rand_index = rand(0, $last_arr_index);
        $rand_text = $file_arr[$rand_index];

        //dd($rand_text);
        /* TEST TO CHECK IF WORDS ARE SEARCHABLE
        $testarr = array();
        foreach($file_arr as $word){
            $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$word.'&type=movie'));
            if($response->Response === "False"){
                array_push($testarr,$word);
            }
        }
        dd($testarr);
        */

        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s='.$rand_text.'&type=movie'));
        //dd($response, $rand_text);
        return view('moviepage',['movies' => $response->Search]);
    }
}
