<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En genre har många filmer

class Genre extends Model
{
    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
