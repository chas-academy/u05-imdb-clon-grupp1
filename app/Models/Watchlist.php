<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En watchlist har en User och många filmer

class Watchlist extends Model
{
    use HasFactory;
    protected $table = 'watchlist_item';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
