<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'actors' => $this->actors,
            'language' => $this->language,
            'release_date' => $this->release_date,
            'img_path' => $this->img_path,
            'trailer_path' => $this->trailer_path,
            'top_rating' => $this->top_rating,
            'movie_genres' => $this->movie_genres,
        ];
    }
}
