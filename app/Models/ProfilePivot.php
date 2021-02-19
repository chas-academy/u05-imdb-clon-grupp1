<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En watchlist har en User och många filmer

class ProfilePivot extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }
}
