<x-app-layout>
    <div class="text-white">

        {{-- Search --}}
        <x-search-form title="Search movies"></x-search-form>

        {{-- Filter, Movies and Pagination --}}
        @if(auth()->user())
        @auth
            <movie-list
            profile-id={{ auth()->user()->profile->id }}
            watchlist={{ $watchlistStatus }}
            :show-watchlist="false"
            :show-filter="true"
            :pagination-number="18"
            />
        @endauth
        @else
            <movie-list
            :profile-id="null"
            :show-watchlist="false"
            :show-filter="true"
            :pagination-number="18" />
        @endif
</x-app-layout>

