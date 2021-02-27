<h1>
    {{ $genre->name }}
</h1>
@foreach ($genre->movies as $movie)
    <a href="/movies/{{ $movie->id }}"> {{ $movie->id }}</a><br>
@endforeach
