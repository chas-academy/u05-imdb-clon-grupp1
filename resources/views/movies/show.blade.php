<x-app-layout>

    <a href="/movies"><- Back</a><br>
    <div class="container mx-auto mt-20">

        @if (Route::has('login'))
        @auth
            <div class="float-right">
        <watchlist-button  movie-id="{{ $movie->id }}" watchlist="{{ $watchlistStatus }}"></watchlist-button>

        @endauth
        @endif

            <p class="border-white border-2 rounded-full inline-flex mt-8 p-4 text-2xl">{{$movie->top_rating}}</p>

        </div>
    <h1 class="text-6xl">{{ $movie->title }}</h1>
    <p class="mb-2">{{ $movie->release_date }} - {{ $movie->language }}</p>
    @foreach ($movie->genres as $genre)
    <x-genre-button link="/genres/{{$genre->id}}">{{ $genre->name }}</x-genre-button>
    @endforeach

    <img class="my-10 w-1/4" src="{{$movie->moviePoster()}}"/>
    <p class="mb-4">{{ $movie->description }}</p>
    <p class="mb-14"><b>Actors: </b>{{$movie->actors}}</p>



    <h2 class="mt-10 mb-4 text-4xl">Reviews</h2>
     <div class="grid lg:grid-cols-3 grid-cols-1 justify-items-center pb-16">
     @foreach ($reviews as $review)
     <div class="bg-blue-900 rounded-2xl xl:w-72 w-40 mx-16 py-6 px-2 mb-8">
        <img class="mx-auto" src="{{ $review->user->profile->profileImage() }}" width="60px">
        <p class="text-center">{{ $review->review }}</p>
       <p><b>Score: </b>{{ $review->rating }}</p>
       <p> <b>By</b> {{ $review->user->username }}</p>
        @can('update', $review)
            <a href="/reviews/{{ $review->id }}/edit">Edit review</a>
        @endcan
     </div>


        {{-- @can('update', $review) --}}
            {{-- <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="delete">Delete

                    review</button>
            </form> --}}
        {{-- @endcan --}}

  @endforeach
</div>
@if (Route::has('login'))
@auth

    <a href="/reviews/{{ $movie->id }}/create">Add review</a><br>



@else
    <p>Please <a href="/login">login</a> to add a review</p><br>
@endauth
@endif
<div class="pb-14">
{!! $reviews->links() !!}
</div>
</div>
</x-app-layout>
