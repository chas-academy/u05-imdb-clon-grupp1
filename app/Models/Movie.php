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
        return $this->belongsToMany(Profile::class, 'watchlist_pivot', 'movies_id', 'profile_id');
    }

    public function getAllGenres($item)
    {
        $arr = array();
        foreach($item->genres as $key => $genre) {
            $arr[$key] = $genre->name . ', ';
        };

        return implode($arr);
    }
}
