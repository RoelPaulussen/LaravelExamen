<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    //
    public function Showmovies(){
        $response = json_decode(Http::get('http://www.omdbapi.com/?apikey=c5f7ae2b&s=day&type=movie'));
        //dd($response->Search);
        $url;
        return view('moviepage',['movies' => $response->Search]);
    }
    
    public function Favorite(){

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
}
