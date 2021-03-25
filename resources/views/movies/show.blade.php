<x-app-layout>
    <div class="text-white min-h-screen pb-10">
        <x-search-form :title="null"></x-search-form>

        <div class="w-screen flex justify-center mt-5">
            <div class="flex flex-col lg:flex-row-reverse justify-center w-10/12 max-w-screen-2xl">
                <img class="height object-cover rounded-2xl lg:h-full lg:w-4/5 lg:max-w-md shadow-md border-r border-t border-gray-800 border-opacity-50" src="{{$movie->moviePoster()}}"/>

                <div class="flex justify-between w-full">
                    <div class="mt-10">
                        <h1 class="text-4xl lg:text-5xl font-medium mb-5 w-11/12 ">{{ $movie->title }}</h1>

                        <p class="text-2xl lg:text-3xl mb-5 w-11/12 ">{{ $movie->release_date }} - {{ $movie->language }}</p>

                        <div class="mb-5">
                            @foreach ($movie->genres as $genre)
                            <x-genre-button link="/genres/{{$genre->id}}">{{ $genre->name }}</x-genre-button>
                            @endforeach
                        </div>

                        <p class="mb-5 ">{{ $movie->description }}</p>

                        <p class=""><b>Actors: </b>{{$movie->actors}}</p>
                    </div>

                    <div class="mt-11 mr-1 lg:mr-10 flex flex-col items-center">
                        <p class=" border-white border-4 rounded-full mb-5 text-2xl text-center px-4 py-2 lg:px-6 lg:py-4">{{($movie->top_rating != null) ? $movie->top_rating : '0' }}</p>

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

        <div class="flex justify-center mt-16">
            <div class="w-10/12 max-w-screen-2xl ">
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-y-6 my-10">
                    @foreach ($reviews as $review)

                        <div class="bg-gray-800 xs:w-full xs:w-96 md:w-11/12 py-4 px-4 rounded-3xl mx-auto shadow-md border-r border-gray-700 border-opacity-50 relative pb-10">
                            <p class="float-right"> {{ $review->user->username }}</p>
                            <img class=" rounded-full h-10 w-10" src="{{ $review->user->profile->profileImage() }}">
                            <p class="w-full break-words mt-4">{{ $review->review }}</p>
                            <p class="absolute bottom-3 left-4"><b>Score: </b>{{ $review->rating }}</p>
                            @can('update', $review)
                                <a class="absolute bottom-3 right-4" href="/reviews/{{ $review->id }}/edit">Edit review</a>
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
            @if (!auth()->user()->reviews->contains('movies_id', $movie->id))
            <a href="/reviews/{{ $movie->id }}/create">Add Review</a>
            @endif
        @else
            <p>Please <a href="/login">login</a> to add a review</p>
        @endauth
        @endif

        @if( $reviews->lastPage() != 1)
        <div class="flex justify-center mt-2">
            @if ($reviews->currentPage() != 1)
            <a href="{{ $reviews->previousPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1 hover:bg-gray-700">Prev</a>
            @else
            <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1">Prev</a>
            @endif
            @for ($i = $reviews->currentPage(); $i <= $reviews->lastPage() &&  $i != $reviews->currentPage() + 5; $i++)
                <a href="{{ 'http://127.0.0.1:8000/movies/'.$movie->id.'?page='.$i }}" class="p-4  rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1 {{ ($reviews->currentPage() == $i) ? 'bg-gray-700 hover:bg-gray-600' : 'bg-gray-800 hover:bg-gray-700' }}">{{ $i }}</a>
            @endfor
            @if ($reviews->currentPage() != $reviews->lastPage())
            <a href="{{ $reviews->nextPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1 hover:bg-gray-700">Next</a>
            @else
            <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</a>
            @endif
        </div>
        @endif
    </div>
</x-app-layout>
