<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MovieCollection(Movie::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->actors = $request->actors;
        $movie->language = $request->language;
        $movie->release_date = $request->release_date;
        $movie->img_path = $request->img_path;
        $movie->trailer_path = $request->trailer_path;
        $movie->top_rating = $request->top_rating;

        $movie->save();

        // Log::info("Movie ID {$movie->id} created successfully.");
        // Log::info("Movie ID {$movie->id} updated successfully.");

        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        // Log::info("Movie ID {$movie->id} deleted successfully.");

        return new MovieResource($movie);
    }
}
