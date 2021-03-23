<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class SearchMoviesController extends Controller
{

    public function search(Request $request)
    {



        $query = $request->input('query');
        //dd($query);

        $movies = Movie::query()->where('title','like',"%$query%")->get();
        // dd($movies);
        return view('movies.search', compact('movies'));

    }
//orWhere('description','like',"%$query%")
}
