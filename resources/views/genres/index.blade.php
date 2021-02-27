<h1>Genres
</h1>
@foreach ($genres as $genre)
    <a href="/genres/{{ $genre->id }}"> {{ $genre->name }}</a><br>
@endforeach
