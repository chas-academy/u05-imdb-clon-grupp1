    <h1>Edit review</h1>
    <form action="/movies/{{$review->movies_id}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="review">Review edit</label>

        <input type="text" name="review" value="{{ old('review') ?? $review->review }}"><br>
        @if ($errors->has('review'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('review') }}</strong>
            </span>
        @endif

        <select name="rating">
            <option value="" hidden>Select a rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        @if ($errors->has('rating'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('rating') }}</strong>
            </span>
        @endif
        <button type="submit">Submit</button>
    </form>
