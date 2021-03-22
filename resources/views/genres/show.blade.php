<x-app-layout>
    <div class="text-white">

          {{-- SEARCH --}}
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl font-medium p-7">{{ $genre->name }}</h1>
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

        @if(auth()->user())
        @auth
            <movie-list profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true"  :show-filter="true" :pagination-number="6" genre-filter={{ $genre->name }}></movie-list>
        @endauth
        @else
            <movie-list :profile-id="null" :show-watchlist="false"  :show-filter="true" :pagination-number="6" genre-filter={{ $genre->name }}></movie-list>
        @endif

    </div>
</x-app-layout>
