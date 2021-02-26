<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En movie har många genre, många reviews, många watchlist

class Movie extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movies_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'watchlist_pivot', 'movies_id', 'profile_id');
    }
}
