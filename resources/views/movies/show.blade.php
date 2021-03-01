<h1>{{$movie->title}}</h1>
<a href="/movies">Back</a><br>

{{ $movie->title }}<br>
{{ $movie->description }}
<br>

<h4>Genres</h4>
@foreach ($movie->genres as $genre)
    {{$genre->name}}<br>
@endforeach

@if (Route::has('login'))
    @auth
<form method="post" action="{{ route('movies.watchlist', $movie->id) }}">
    @csrf
    <button type="submit" name="delete">Add to watchlist

        </button>
</form><br>

        <a href="/reviews/{{ $movie->id }}/create">Add review</a><br>
    @else
        <p>Please <a href="/login">login</a> to add a review</p><br>
    @endauth
@endif

@foreach ($reviews as $review)
<img src="{{$review->user->profile->profileImage()}}" width="50px">
    {{ $review->review }}<br>
    {{ $review->rating }}<br>
    By {{$review->user->username}}<br>
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
{!! $reviews->links() !!}