<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show', 'addToWatchlist']);
    }

    public function index(Movie $movie)
    {
        if (!auth()->user()) return view('movies.index');

        $watchlistStatus = $movie->watchlistStatus();
        return view('movies.index', compact('watchlistStatus'));

    }

    public function show(Movie $movie, User $user)
    {
        $watchlistStatus = (auth()->user() ? auth()->user()->profile->movies->contains($movie->id) : false);

        $reviews = $movie->reviews()->latest()->paginate(4);
        return view('movies.show', compact('movie', 'reviews', 'user', 'watchlistStatus'));
    }

    public function addToWatchlist(Movie $movie)
    {
        return auth()->user()->profile->movies()->toggle($movie);
    }

    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'actors' => 'required',
            'language' => 'required',
            'release_date' => 'required',
            'img_path' => '',
            'trailer_path' => 'required',
        ]);

        $genres = request()->validate([
            'genres' => 'required'
        ]);

        if (request('genres')) {
            $data['movie_genres'] = implode(',', request('genres'));
        }

        if (request('img_path')) {
            $imagePath = request('img_path')->store('movieposter', 's3');
            Storage::disk('s3')->setVisibility($imagePath, 'public');
            $image = ['img_path' => Storage::disk('s3')->url($imagePath)];
        }

        $movie = Movie::create(array_merge(
            $data,
            $image ?? [],
        ));

        $genres = Genre::all();
        $genres_id = array();
        foreach ($genres as $genre) {
            foreach (request('genres') as $genresNameKey => $genre_name) {
                if ($genre_name == $genre->name) {
                    $genres_id[$genresNameKey] = $genre->id;
                }
            }
        }

        $movie->genres()->attach($genres_id);

        return redirect("/movies");
    }

    public function edit($id)
    {
        $genres = Genre::all();
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update($id)
    {
        $movie = Movie::findOrFail($id);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'actors' => 'required',
            'language' => 'required',
            'release_date' => 'required',
            'img_path' => '',
            'trailer_path' => 'required',
        ]);

        $genres = request()->validate([
            'genres' => 'required'
        ]);

        $movie->genres()->detach();

        if ($movie->img_path) {
            if (File::exists("storage/{$movie->img_path}")) {
                File::delete("storage/{$movie->img_path}");
            }
        }

        if (request('genres')) {
            $data['movie_genres'] = implode(',', request('genres'));
        }

        if (request('img_path')) {
            $imagePath = request('img_path')->store('movieposter', 's3');
            Storage::disk('s3')->setVisibility($imagePath, 'public');
            $image = ['img_path' => Storage::disk('s3')->url($imagePath)];
        }

        $movie->update(array_merge(
            $data,
            $image ?? [],
        ));

        $genres = Genre::all();
        $genres_id = array();
        foreach ($genres as $genre) {
            foreach (request('genres') as $genresNameKey => $genre_name) {
                if ($genre_name == $genre->name) {
                    $genres_id[$genresNameKey] = $genre->id;
                }
            }
        }

        $movie->genres()->attach($genres_id);

        return redirect("/movies/{$movie->id}");
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->reviews()->delete();
        $movie->genres()->detach();
        $movie->delete();

        return redirect('/movies');
    }
}
