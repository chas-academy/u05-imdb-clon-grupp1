<x-app-layout>
    <div class="text-white">
          {{-- SEARCH --}}
        <x-search-form :title="$genre->name"></x-search-form>

        @if(auth()->user())
        @auth
            <movie-list
            profile-id={{ auth()->user()->profile->id }}
            watchlist={{ $watchlistStatus }}
            :show-watchlist="true"
            :show-filter="true"
            :pagination-number="6"
            genre-filter={{ $genre->name }}
            />
        @endauth
        @else
            <movie-list
            :profile-id="null"
            :show-watchlist="false"
            :show-filter="true"
            :pagination-number="6"
            genre-filter={{ $genre->name }}
            />
        @endif
    </div>
</x-app-layout>
