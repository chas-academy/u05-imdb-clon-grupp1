<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GenreButton extends Component
{
    public $link;
    public $color = array(
    'bg-indigo-800');

    public $randomColor;

    public function __construct($link)
    {
        $this->link = $link;
    }

    // Start temporary
    public function randomColor()
    {
        return $randomColor = $this->color[array_rand($this->color, 1)];
    }
    // End temporary

    public function render()
    {
        return view('components.genre-button');
    }
}
