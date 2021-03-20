<x-app-layout>
    <div class="text-white">

        {{-- SEARCH --}}
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-white text-3xl font-medium p-7">Watchlist</h1>

            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg text-white focus:outline-none focus:shadow-outline shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

        {{-- WATCHLIST --}}
        <div class="flex justify-center">
            <div class="w-full max-w-screen-xl p-6 ">
                <div class="md:mx-auto md:grid md:grid-cols-2 md:grid-rows-5 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 lg:grid-rows-3">
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
            </div>
        </div>
    </div>
</x-app-layout>
