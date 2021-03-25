<x-app-layout>
    <div class="text-white">
        {{-- SEARCH --}}
        <x-search-form title="Watchlist"></x-search-form>

        {{-- Filter, Watchlist and Pagination --}}
        @if(auth()->user())
        @auth
            <movie-list profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true"  :show-filter="true" :pagination-number="18"></movie-list>
        @endauth
        @endif
    </div>
</x-app-layout>
