@extends('layouts.app')
​
@section('content')
<div class="container">
    ​
    <form action="/review/{{ $reviews->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <!--Update controller method-->
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Review</h1>
                </div>
                <div class="form-group row">
                    <label for="review" class="col-md-4 col-form-label">Review</label>
                    <input id="review" type="text" class="form-control @error('review') is-invalid @enderror" name="review" value="{{ old('review') ?? $user->profile->review }}" autocomplete="review" autofocus>
                    @error('review')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                ​
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
                ​
            </div>
        </div>
        ​
    </form>
    ​
</div>
@endsection