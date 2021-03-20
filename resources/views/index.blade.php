<x-app-layout>
    <div class="text-white">

        {{-- SEARCH --}}
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl font-medium p-7">Find, save and review movies</h1>
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

        {{-- SLIDER --}}
        @if(auth()->user())
            @auth
                <movie-slider profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true"></movie-slider>
            @endauth
        @else
            <movie-slider profile-id={{ null }}></movie-slider>
        @endif
        <div class="flex justify-center">
            <p class="w-screen max-w-screen-2xl pr-3">
                <a href="/movies" class="float-right py-2 px-3 rounded-lg bg-indigo-900 text-white transform hover:scale-105">Movies</a>
            </p>
        </div>

        {{-- GENRES --}}
        <div class="flex justify-center">
            <div class="w-full max-w-screen-xl p-6">
                <h2 class="md:mx-auto text-xl font-medium pb-2 pl-5 md:w-4/5 lg:w-full">Genres</h2>
                <div class="md:mx-auto w-full md:w-4/5 lg:w-full">
                    <div class=" flex flex-wrap px-3  max-w-xl">
                        @foreach ($genres as $genre)
                        <x-genre-button :link="'/genres/'.$genre->id">{{ __($genre->name) }}</x-genre-button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- MOVIES/WATCHLIST --}}
        <div class="flex justify-center">
            <div class="w-full max-w-screen-xl p-6 ">
                @if(auth()->user())
                    <h2 class="md:mx-auto text-xl font-medium pb-2 pl-5  md:w-4/5 lg:w-full">Watchlist</h2>
                @else
                    <h2 class="md:mx-auto text-xl font-medium pb-2 pl-5  md:w-4/5 lg:w-full">Movies</h2>
                @endif

                @if(auth()->user())
                    <div class="md:mx-auto md:grid md:grid-cols-2 md:grid-rows-5 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 lg:grid-rows-3">
                        @auth
                            @foreach ($profileWatchlist as $profileWatchlistMovie)
                                <x-movie-item
                                :movie="$profileWatchlistMovie"
                                :genres="$movie->getAllGenres($profileWatchlistMovie)"
                                :watchlistStatus="$watchlistStatus"
                                />
                            @endforeach
                    </div>

                    <x-pagination
                    :currentPage="$profileWatchlist->currentPage()"
                    :lastPage="$profileWatchlist->lastPage()"
                    :previousPageUrl="$profileWatchlist->previousPageUrl()"
                    :nextPageUrl="$profileWatchlist->nextPageUrl()"
                    />
                @endauth

                @else
                    <div class="md:mx-auto md:grid md:grid-cols-2 md:grid-rows-5 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 lg:grid-rows-3">
                        @foreach ($movies as $moviesMovie)
                            <x-movie-item
                            :movie="$moviesMovie"
                            :genres="$movie->getAllGenres($moviesMovie)"
                            :watchlistStatus="null"
                            />
                        @endforeach
                    </div>

                    <x-pagination
                    :currentPage="$movies->currentPage()"
                    :lastPage="$movies->lastPage()"
                    :previousPageUrl="$movies->previousPageUrl()"
                    :nextPageUrl="$movies->nextPageUrl()"
                    />
                @endif
            </div>
        </div>
</x-app-layout>
