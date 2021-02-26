@foreach ($reviews as $review)
    <a href="/reviews/{{$review->id}}">{{ $review->review }}</a><br>
@endforeach
