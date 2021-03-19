<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieItem extends Component
{
    public $id;
    public $title;
    public $releseDate;
    public $language;
    public $img;
    public $rating;
    public $movie;
    public $watchlistStatus;
    public $genres;

    public function __construct($genres, $watchlistStatus, $movie)
    {
        $this->id = $movie->id;
        $this->title = $movie->title;
        $this->releseDate = $movie->release_date;
        $this->language = $movie->language;
        $this->img = $movie->img_path;
        $this->rating = $movie->top_rating;
        $this->genres = $genres;
        $this->watchlistStatus = $watchlistStatus;
    }

    public function render()
    {
        return view('components.movie-item');
    }
}
