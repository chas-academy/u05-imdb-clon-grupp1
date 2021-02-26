<h1>Movies</h1>
<a href="/movies">Back</a><br>

{{ $movie->title }}
{{ $movie->description }}
<br>

{{-- På denna sida tänkt att man kan föra in reviews --}}
@if (Route::has('login'))
    @auth
        <a href="/reviews/{{ $movie->id }}/create">Add review</a><br>
    @else
        <p>Please <a href="/login">login</a> to add a review</p><br>
    @endauth
@endif

@foreach ($movie->reviews as $review)
<img src="{{$review->user->profile->profileImage()}}" width="100px">
    {{ $review->review }}<br>
    {{ $review->rating }}<br>
    By {{$review->user->username}}
    @can('update', $review)
    <a href="/reviews/{{ $review->id }}/edit">Edit review</a>
    @endcan

    @can('update', $review)
        <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete">Delete

                review</button>
        </form>
    @endcan
@endforeach
