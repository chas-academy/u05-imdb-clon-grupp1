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
    public $genres;
    public $rating;
    public $watchlistStatus;

    public function __construct($id, $title, $releseDate ,$language, $img, $genres, $rating, $watchlistStatus)
    {
        $this->id = $id;
        $this->title = $title;
        $this->releseDate = $releseDate;
        $this->language = $language;
        $this->img = $img;
        $this->genres = $genres;
        $this->rating = $rating;
        $this->watchlistStatus = $watchlistStatus;
    }

    public function render()
    {
        return view('components.movie-item');
    }
}
