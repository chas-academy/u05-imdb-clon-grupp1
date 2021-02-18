<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En movie har många genre, många reviews, många watchlist

class Movie extends Model
{
    use HasFactory;
    // protected $guarded = [];

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }
}
