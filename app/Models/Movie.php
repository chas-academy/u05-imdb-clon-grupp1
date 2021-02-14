<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En movie har många genre, många reviews, många watchlist

class Movie extends Model
{
    use HasFactory;

    public function genre()
    {
        return $this->hasMany(Genre::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function watchlist()
    {
        return $this->hasMany(Watchlist::class);
    }
}
