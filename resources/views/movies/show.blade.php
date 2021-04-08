<x-app-layout>
    <div class="text-white min-h-screen pb-10">
        <x-search-form :title="null"></x-search-form>

        <div class="w-screen flex justify-center mt-5">
            <div class="flex flex-col lg:flex-row justify-center w-10/12 max-w-screen-xl">
                <div class="w-full h-full lg:h-full lg:w-full max-w-md relative">
                    <a href= {{ $movie->trailer_path }} target="blank">
                        <img class="w-full h-full object-cover rounded-2xl shadow-md border-r border-t border-gray-800 border-opacity-50" src="{{$movie->moviePoster()}}" alt="{{ $movie->title }}"/>
                        <div class="color rounded-2xl w-full h-full top-0 absolute z-50 opacity-0 hover:opacity-100 transition flex justify-center items-center">
                            <svg class="h-10 w-10" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="163.861px" height="163.861px" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 163.861 163.861;"
                                xml:space="preserve">
                                <path d="M34.857,3.613C20.084-4.861,8.107,2.081,8.107,19.106v125.637c0,17.042,11.977,23.975,26.75,15.509L144.67,97.275
                                    c14.778-8.477,14.778-22.211,0-30.686L34.857,3.613z"/>
                            </svg>

                        </div>
                    </a>
                </div>

                <div class="lg:ml-10 flex justify-between w-full">
                    <div class="mt-10  w-full">
                        <h1 class="text-4xl lg:text-5xl font-medium mb-5 w-10/12 ml-1">{{ $movie->title }}</h1>

                        <p class="text-2xl lg:text-3xl mb-5 w-full ml-1">{{ $movie->release_date }} - {{ $movie->language }}</p>

                        <div class="mb-5">
                            @foreach ($movie->genres as $genre)
                            <x-genre-button link="/genres/{{$genre->id}}">{{ $genre->name }}</x-genre-button>
                            @endforeach
                        </div>

                        <p class="mb-5 ml-1">{{ $movie->description }}</p>

                        <p class="mb-10 ml-1"><b>Actors: </b>{{$movie->actors}}</p>

                        @if (Route::has('login'))
                        @auth
                            @if (!auth()->user()->reviews->contains('movies_id', $movie->id))
                            <a class="py-2 px-3 rounded-lg bg-indigo-900 text-white transform hover:scale-105" href="/reviews/{{ $movie->id }}/create">Add Review</a>
                            @endif
                        @else
                            <a class="py-2 px-3 rounded-lg bg-indigo-900 text-white transform hover:scale-105" href="/login">login to review</a>
                        @endauth
                        @endif
                    </div>

                    <div class="mt-11 mr-2 flex flex-col items-center">
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
            <div class="w-10/12 max-w-screen-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-y-6 my-10">
                    @foreach ($reviews as $review)

                        <div class="bg-gray-800 xs:w-full xs:w-96 md:w-11/12 py-4 px-4 rounded-xl mx-auto shadow-md border-r border-gray-700 border-opacity-50 relative pb-10">
                            <p class="float-right"> {{ $review->user->username }}</p>
                            <img class=" rounded-full h-10 w-10" src="{{ $review->user->profile->profileImage() }}">
                            <p class="w-full break-words mt-4 mb-3">{{ $review->review }}</p>
                            <p class="absolute bottom-3 left-4"><b>Score: </b>{{ $review->rating }}</p>
                            @can('update', $review)
                                <a class="absolute bottom-3 right-20 bg-gray-700 px-2 py-1 rounded-md" href="/reviews/{{ $review->id }}/edit">Edit</a>

                                <form class="absolute bottom-3 right-3 bg-gray-900 px-2 py-1 rounded-md" action="{{ route('reviews.destroy', $review->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete">Delete</button>
                                </form>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

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
