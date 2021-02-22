<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GenreButton extends Component
{
    public $link;
    public $color = array(
    'bg-gradient-to-r from-green-300 to-blue-400 hover:from-green-400 hover:to-blue-500',
    'bg-gradient-to-r from-yellow-200 to-red-500 hover:from-yellow-300 hover:to-red-600',
    'bg-gradient-to-r from-purple-200 to-purple-500 hover:from-purple-300 hover:to-purple-600',
    'bg-gradient-to-r from-pink-200 to-pink-500 hover:from-pink-300 hover:to-pink-600',
    'bg-gradient-to-r from-green-200 to-green-500 hover:from-green-300 hover:to-green-600',
    'bg-indigo-800 hover:bg-indigo-900');

    public $randomColor;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function randomColor()
    {
        return $randomColor = $this->color[array_rand($this->color, 1)];
    }

    public function render()
    {
        return view('components.genre-button');
    }
}