<x-app-layout>
    <div class="relative text-white h-screen pt-10">
        <div class="">
            <img class="absolute top-36" src="{{$movie->moviePoster()}}"/>
            <div class="w-screen h-full absolute top-24 bg-gradient-to-b from-gray-900"></div>
        </div>

        <div class="flex flex-col justify-center items-center">
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>


        <div class="w-screen flex justify-center mt-20">
            <div class="z-10 w-4/5 max-w-screen-2xl flex justify-between">
                {{-- Movie info --}}
                <div>
                    <h1 class="text-6xl font-medium mb-5">{{ $movie->title }}</h1>

                    <p class="text-3xl mb-5">{{ $movie->release_date }} - {{ $movie->language }}</p>

                    <div class="mb-5">
                        @foreach ($movie->genres as $genre)
                        <x-genre-button link="/genres/{{$genre->id}}">{{ $genre->name }}</x-genre-button>
                        @endforeach
                    </div>


                    <p class="mb-5">{{ $movie->description }}</p>

                    <p class=""><b>Actors: </b>{{$movie->actors}}</p>
                </div>

                {{-- Score/Watchlist-button --}}
                <div class="flex flex-col">
                    <div class="border-white border-4 rounded-full w-16 h-16 mb-6">
                        <p class=" text-2xl text-center my-3">{{$movie->top_rating}}</p>
                    </div>

                    <div class="mx-auto">
                        @if (Route::has('login'))
                        @auth
                            <watchlist-button  movie-id="{{ $movie->id }}" watchlist="{{ $watchlistStatus }}"></watchlist-button>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{--
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
        @can('update', $review)
            <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="delete">Delete

                    review</button>
            </form>
        @endcan
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
</div> --}}
