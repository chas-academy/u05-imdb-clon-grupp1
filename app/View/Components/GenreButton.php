<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GenreButton extends Component
{
    public $link;
    public $color = array(
    'bg-gradient-to-r from-green-300 to-blue-400',
    'bg-gradient-to-r from-yellow-200 to-red-500',
    'bg-gradient-to-r from-purple-200 to-purple-500',
    'bg-gradient-to-r from-pink-200 to-pink-500',
    'bg-gradient-to-r from-green-200 to-green-500',
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
