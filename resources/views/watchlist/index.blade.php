<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-white text-3xl font-medium p-7">Watchlist</h1>

        <form class="w-4/5 max-w-screen-xl relative">
            <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg text-white focus:outline-none focus:shadow-outline shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" height="136pt" version="1.1" viewBox="-1 0 136 136.21852" width="136pt" class="absolute w-5 h-5 right-6 top-5">
                    <g id="surface1">
                    <path style="fill:#ffffff;"  d="M 93.148438 80.832031 C 109.5 57.742188 104.03125 25.769531 80.941406 9.421875 C 57.851562 -6.925781 25.878906 -1.460938 9.53125 21.632812 C -6.816406 44.722656 -1.351562 76.691406 21.742188 93.039062 C 38.222656 104.707031 60.011719 105.605469 77.394531 95.339844 L 115.164062 132.882812 C 119.242188 137.175781 126.027344 137.347656 130.320312 133.269531 C 134.613281 129.195312 134.785156 122.410156 130.710938 118.117188 C 130.582031 117.980469 130.457031 117.855469 130.320312 117.726562 Z M 51.308594 84.332031 C 33.0625 84.335938 18.269531 69.554688 18.257812 51.308594 C 18.253906 33.0625 33.035156 18.269531 51.285156 18.261719 C 69.507812 18.253906 84.292969 33.011719 84.328125 51.234375 C 84.359375 69.484375 69.585938 84.300781 51.332031 84.332031 C 51.324219 84.332031 51.320312 84.332031 51.308594 84.332031 Z M 51.308594 84.332031 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
                    </g>
                </svg>
            </button>
        </form>
    </div>

    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl p-6 ">

            <div class="md:mx-auto md:grid md:grid-flow-col md:grid-cols-2 md:grid-rows-5 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 lg:grid-rows-3">
                @foreach ($profileWatchlist as $profileWatchlistMovie)
                <x-movie-item
                :movie="$profileWatchlistMovie"
                :genres="$movie->getAllGenres($profileWatchlistMovie)"
                :watchlistStatus="$watchlistStatus"
                />
                @endforeach
            </div>

            <div class="text-white flex justify-center mt-2">
                @if ($profileWatchlist->currentPage() != 1)
                <a href="{{ $profileWatchlist->previousPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1">Prev</a>
                @else
                <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1"  >Prev</a>
                @endif
                @for ($i = $profileWatchlist->currentPage(); $i <= $profileWatchlist->lastPage() &&  $i != $profileWatchlist->currentPage() + 5; $i++)
                    <a href="{{ 'http://127.0.0.1:8000?page=' . $i }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1">{{ $i }}</a>
                @endfor
                @if ($profileWatchlist->currentPage() != $profileWatchlist->lastPage())
                <a href="{{ $profileWatchlist->nextPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1">Next</a>
                @else
                <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>