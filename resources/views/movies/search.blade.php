<x-app-layout>

<div class="text-white">
    {{-- SEARCH --}}
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl font-medium p-7">Find, save and review movies</h1>
        <form class="w-4/5 max-w-screen-xl relative" action="{{route('search')}}" method="GET">
            <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies..." value="" name="query" id="query">
            <button>
                <x-search-icon/>
            </button>
            </form>
    </div>
    {{-- MOVIES RESULT --}}

    @if(auth()->user())
    @auth
        <movie-list
        profile-id={{ auth()->user()->profile->id }}
        watchlist={{ $watchlistStatus }}
        search-movies-id={{ $searchMoviesId }}
        :show-watchlist="false"
        :show-search="true"
        :show-filter="true"
        :pagination-number="18"
        />
    @endauth
    @else
        <movie-list
        :profile-id="null"
        search-movies-id={{ $searchMoviesId }}
        :show-watchlist="false"
        :show-search="true"
        :show-filter="true"
        :pagination-number="18"
        />
    @endif

</x-app-layout>
