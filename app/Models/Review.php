<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Review har en film
// Review har en användare

class Review extends Model
{
    use HasFactory;
    protected $table = 'ratings_and_reviews';

    public function movie()
    {
        return $this->hasOne(Movie::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
