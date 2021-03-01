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
