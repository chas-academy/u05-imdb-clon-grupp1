<x-app-layout>
    <div class="text-white">
        <h1>Movies</h1>
        @auth
            @if (Auth::user()->isRole() == 'admin')
                <a href="/movies/create">Add movie</a><br>
            @endif
        @endauth

        <div class="flex justify-center">
            <div class="w-full max-w-screen-xl p-6 ">
                <div class="md:mx-auto md:grid md:grid-flow-col md:grid-cols-2 md:grid-rows-5 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 lg:grid-rows-3">
                    @foreach ($movies as $moviesMovie)
                    @auth
                    @if(auth()->user())
                    <x-movie-item
                    :movie="$moviesMovie"
                    :genres="$movie->getAllGenres($moviesMovie)"
                    :watchlistStatus="$watchlistStatus"
                    />
                    @endauth
                    @else
                    <x-movie-item
                    :movie="$moviesMovie"
                    :genres="$movie->getAllGenres($moviesMovie)"
                    :watchlistStatus="null"
                    />
                    @endif
                        {{-- @auth
                            @if (Auth::user()->isRole() == 'admin')
                                <a href="/movies/{{ $movie->id }}/edit">Edit Movie</a>
                                <form method="POST" action="/movies/{{ $movie->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete">Delete movie</button>
                                </form><br>
                            @endif
                        @endauth --}}
                    @endforeach
                </div>

                <div class="text-white flex justify-center mt-2">
                    @if ($movies->currentPage() != 1)
                    <a href="{{ $movies->previousPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1">Prev</a>
                    @else
                    <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1">Prev</a>
                    @endif
                    @for ($i = $movies->currentPage(); $i <= $movies->lastPage() &&  $i != $movies->currentPage() + 5; $i++)
                        <a href="{{ 'http://127.0.0.1:8000?page=' . $i }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1">{{ $i }}</a>
                    @endfor
                    @if ($movies->currentPage() != $movies->lastPage())
                    <a href="{{ $movies->nextPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1">Next</a>
                    @else
                    <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

