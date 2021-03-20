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

                <x-pagination
                    :currentPage="$movies->currentPage()"
                    :lastPage="$movies->lastPage()"
                    :previousPageUrl="$movies->previousPageUrl()"
                    :nextPageUrl="$movies->nextPageUrl()"
                />
            </div>
        </div>
    </div>
</x-app-layout>

