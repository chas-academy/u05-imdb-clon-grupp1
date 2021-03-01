<div>
    <h1> Add new movie </h1>
    <form action="/movies" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" value="{{ old('title') }}" name="title"><br>
        @if ($errors->has('title'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif

        <label for="description">Description</label>
        <input type="text" id="description" value="{{ old('description') }}" name=" description"><br>
        @if ($errors->has('description'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif

        <label for="actors">Actors</label>
        <input type="text" id="actors" value="{{ old('actors') }}" name=" actors"><br>
        @if ($errors->has('actors'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('actors') }}</strong>
            </span>
        @endif

        <label for="language">Language</label>
        <input type="text" id="language" value="{{ old('language') }}" name="language"><br>
        @if ($errors->has('language'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('language') }}</strong>
            </span>
        @endif

        <label for="release_date">Release Date</label>
        <input type="text" id="release_date" value="{{ old('release_date') }}" name="release_date"><br>
        @if ($errors->has('release_date'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('release_date') }}</strong>
            </span>
        @endif

        <label for="img_path">Add movie image url</label>
        <input type="url" id="img_path" value="{{ old('img_path') }}" name="img_path"><br>
        @if ($errors->has('img_path'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('img_path') }}</strong>
            </span>
        @endif

        <label for="trailer_path">Add movie trailer url</label>
        <input type="url" id="trailer_path" value="{{ old('trailer_path') }}" name="trailer_path"><br>
        @if ($errors->has('trailer_path'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('trailer_path') }}</strong>
            </span>
        @endif
        <label>Select Genres</label><br>
        @foreach ($genres as $genre)
            <label>{{ $genre->name }}</label>
            <input name="genres[]" value="{{ $genre->id }}" type="checkbox"><br>
        @endforeach
        @if ($errors->has('genres'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('genres') }}</strong>
            </span>
        @endif
        <input type="submit">
    </form>

</div>
