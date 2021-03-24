<div>
    <h1> Edit movie </h1>
    <form action="/movies/{{ $movie->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') ?? $movie->title }}"><br>
        @if ($errors->has('title'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif

        <label for="description">Description</label>
        <input type="text" id="description" name="description"
            value="{{ old('description') ?? $movie->description }}"><br>
        @if ($errors->has('description'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif

        <label for="actors">Actors</label>
        <input type="text" id="actors" name="actors" value="{{ old('actors') ?? $movie->actors }}"><br>
        @if ($errors->has('actors'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('actors') }}</strong>
            </span>
        @endif

        <label for="language">Language</label>
        <input type="text" id="language" name="language" value="{{ old('language') ?? $movie->language }}"><br>
        @if ($errors->has('language'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('language') }}</strong>
            </span>
        @endif

        <label for="release_date">Release Date</label>
        <input type="text" id="release_date" name="release_date"
            value="{{ old('release_date') ?? $movie->release_date }}"><br>
        @if ($errors->has('release_date'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('release_date') }}</strong>
            </span>
        @endif

        <label for="img_path">Add movie image url</label>
        <input type="file" id="img_path" name="img_path"><br>
        @if ($errors->has('img_path'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('img_path') }}</strong>
            </span>
        @endif

        <label for="trailer_path">Add movie trailer url</label>
        <input type="url" id="trailer_path" name="trailer_path"
            value="{{ old('trailer_path') ?? $movie->trailer_path }}"><br>
        @if ($errors->has('trailer_path'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('trailer_path') }}</strong>
            </span>
        @endif
        <label>Select Genres</label><br>
        @foreach ($genres as $genre)
            <label>{{ $genre->name }}</label>
            <input name="genres[]" value="{{ $genre->name }}" type="checkbox"><br>
        @endforeach
        @if ($errors->has('genres'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('genres') }}</strong>
            </span>
        @endif

        <input type="submit">
    </form>

    <form method="POST" action="/movies/{{ $movie->id }}">
        @csrf
        @method('DELETE')
        <button type="submit" name="delete">Delete movie</button>
    </form>

</div>
