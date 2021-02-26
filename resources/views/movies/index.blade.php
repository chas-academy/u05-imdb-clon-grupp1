<h1>Movies</h1>
<a href="/movies/create">Add movie</a><br>
@foreach ($movies as $movie)
    <a href="/movies/{{$movie->id}}">{{$movie->title}} </a>
    <a href="/movies/{{ $movie->id }}/edit">Edit Movie</a>
    <form method="POST" action="/movies/{{$movie->id}}">
            @csrf
            @method('DELETE')   
            <button type="submit" name="delete">Delete movie</button> 
    </form><br>
@endforeach