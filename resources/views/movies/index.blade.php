<h1>Movies</h1>
@auth
    @if (Auth::user()->isRole() == 'admin')
        <a href="/movies/create">Add movie</a><br>
    @endif
@endauth


@foreach ($movies as $movie)
<a href="/movies/{{ $movie->id }}">{{ $movie->title }} </a>
@auth
@if (Auth::user()->isRole() == 'admin')
<a href="/movies/{{ $movie->id }}/edit">Edit Movie</a>
@endif
@endauth
<form method="POST" action="/movies/{{ $movie->id }}">
    @csrf
    @method('DELETE')
    <button type="submit" name="delete">Delete movie</button>
</form><br>
@endforeach

<div class="mt-10 text-blue-500">
    @if ($movies->currentPage() != 1)
    <a href="{{ $movies->previousPageUrl() }}">Previous</a>
    @else
    <a>Previous</a>
    @endif
    @for ($i = $movies->currentPage(); $i <= $movies->lastPage() &&  $i != $movies->currentPage() + 5; $i++)
        <a href="{{ 'http://127.0.0.1:8000/movies?page=' . $i }}">{{ $i }}</a>
    @endfor
    @if ($movies->currentPage() != $movies->lastPage())
    <a href="{{ $movies->nextPageUrl() }}">Next</a>
    @else
    <a>Next</a>
    @endif
</div>


