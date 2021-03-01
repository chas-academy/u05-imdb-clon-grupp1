<div>
    <h1> Add new movie </h1>
    <form action="/movies" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title"><br>
        @if ($errors->has('title'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif

        <label for="description">Description</label>
        <input type="text" id="description" name="description"><br>
        @if ($errors->has('description'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
    
        <label for="actors">Actors</label>
        <input type="text" id="actors" name="actors"><br>
        @if ($errors->has('actors'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('actors') }}</strong>
        </span>
    @endif
    
        <label for="language">Language</label>
        <input type="text" id="language" name="language"><br>
        @if ($errors->has('language'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('language') }}</strong>
        </span>
    @endif
    
        <label for="release_date">Release Date</label>
        <input type="text" id="release_date" name="release_date"><br>
        @if ($errors->has('release_date'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('release_date') }}</strong>
        </span>
    @endif
    
        <label for="img_path">Add movie image url</label>
        <input type="url" id="img_path" name="img_path"><br>
        @if ($errors->has('img_path'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('img_path') }}</strong>
        </span>
    @endif
    
        <label for="trailer_path">Add movie trailer url</label>
        <input type="url" id="trailer_path" name="trailer_path"><br>
        @if ($errors->has('trailer_path'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('trailer_path') }}</strong>
        </span>
    @endif
    <select name="genres" multiple="">
        <option hidden value="">Select genres</option>
        <option value="1">Comedy</option>
        <option value="2">Action</option>
        <option value="3">Drama</option>
        <option value="4">Fantasy</option>
        <option value="5">Horror</option>
        <option value="6">Mystery</option>
        <option value="7">Romance</option>
        <option value="8">Thriller</option>
        <option value="9">Sci-fi</option>
    </select><br>
        <input type="submit">
    </form>

</div>
