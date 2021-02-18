<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $movies = Movie::all();

        return view('index', compact('genres', 'movies'));
    }
}
