<h1>
    Edit Profile
    <h1>


     <form action="/profile/{{$user->profile->id}}" method="POST">
        @csrf
        @method('PATCH')

        <label for="title">Title</label>
        
        <input type="text" id="title" name="title" value="{{ old('title') ?? $user->profile->title }}"><br>
        @if ($errors->has('title'))
        <span class="text-red-600" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif

    <button type="submit">Submit</button>

</form>