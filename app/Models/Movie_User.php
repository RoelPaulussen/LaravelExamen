<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_User extends Model
{
    use HasFactory;
    protected $table = 'movie_user';
    public $guarded = [];
    public function user() {
        return $this->belongsToMany(User::class); 
    }
    public function movie() {
        return $this->belongsToMany(Movie::class); 
    }
}
