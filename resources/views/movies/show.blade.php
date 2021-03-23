<x-app-layout>
    <div class="text-white h-screen">
        <div class="flex flex-col justify-center items-center">
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

        <div class="w-screen flex justify-center mt-5 bg-green-400">
            <div class="flex flex-col lg:flex-row-reverse justify-center w-10/12 max-w-screen-2xl bg-green-600">
                <img class="height object-cover rounded-2xl lg:h-full lg:w-4/5 lg:max-w-md shadow-md border-r border-t border-gray-800 border-opacity-50" src="{{$movie->moviePoster()}}"/>

                <div class="flex justify-between w-full">
                    <div class="mt-10">
                        <h1 class="text-4xl lg:text-5xl font-medium mb-5">{{ $movie->title }}</h1>

                        <p class="text-2xl lg:text-3xl mb-5">{{ $movie->release_date }} - {{ $movie->language }}</p>

                        <div class="mb-5">
                            @foreach ($movie->genres as $genre)
                            <x-genre-button link="/genres/{{$genre->id}}">{{ $genre->name }}</x-genre-button>
                            @endforeach
                        </div>

                        <p class="mb-5">{{ $movie->description }}</p>

                        <p class=""><b>Actors: </b>{{$movie->actors}}</p>
                    </div>

                    <div class="mt-11 mr-1 lg:mr-10 flex flex-col items-center">
                        <p class=" border-white border-4 rounded-full mb-5 text-2xl text-center px-4 py-2 lg:px-6 lg:py-4">{{$movie->top_rating}}</p>

                        <div class="">
                            @if (Route::has('login'))
                            @auth
                                <watchlist-button  movie-id="{{ $movie->id }}" watchlist="{{ $watchlistStatus }}" class="h-9 w-9"></watchlist-button>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-10/12 max-w-screen-2xl bg-green-800">
                <h2 class="md:mx-auto text-xl font-medium md:w-4/5 lg:w-full">Genres</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-y-6 bg-blue-500">
                    @foreach ($reviews as $review)

                        <div class="bg-indigo-900 rounded-2xl mx-auto w-72 py-6 px-2">
                            <img class="mx-auto rounded-full h-10 w-10" src="{{ $review->user->profile->profileImage() }}" width="60px">
                            <p class="text-center">{{ $review->review }}</p>
                            <p><b>Score: </b>{{ $review->rating }}</p>
                            <p> <b>By</b> {{ $review->user->username }}</p>
                            @can('update', $review)
                                <a href="/reviews/{{ $review->id }}/edit">Edit review</a>
                            @endcan
                        </div>

                            {{-- @can('update', $review)
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete">Delete

                                        review</button>
                                </form>
                            @endcan --}}
                    @endforeach
                </div>
            </div>
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


