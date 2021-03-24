<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En movie har många genre, många reviews, många watchlist
class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function moviePoster()
    {
        $imagePath = ($this->img_path) ? $this->img_path : 'profile/noimage.png';
        return '/storage/' . $imagePath;
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movies_pivot', 'movies_id', 'genres_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movies_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'watchlist_pivot', 'movies_id', 'profile_name');
    }

    public function watchlistStatus(){

        $watchlistStatus = array();
        foreach(auth()->user()->profile->movies as $key => $movie) {
            $watchlistStatus[$key] = $movie->id . ',';
        };
        $watchlistStatus = ',' . implode($watchlistStatus);

        return $watchlistStatus;
    }

    public function updateTopRating($movie){

        $data_rating = $movie->reviews()->avg('rating');
        $data['top_rating'] =  $data_rating;
        $movie->update($data);
    }
}
