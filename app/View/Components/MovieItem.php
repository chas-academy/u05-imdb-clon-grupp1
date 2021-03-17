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

    public function __construct($id, $title, $releseDate ,$language, $img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->releseDate = $releseDate;
        $this->language = $language;
        $this->img = $img;
    }

    public function render()
    {
        return view('components.movie-item');
    }
}
