<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $currentPage;
    public $lastPage;
    public $previousPageUrl;
    public $nextPageUrl;

    public function __construct($currentPage, $lastPage, $previousPageUrl, $nextPageUrl)
    {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->previousPageUrl = $previousPageUrl;
        $this->nextPageUrl = $nextPageUrl;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
