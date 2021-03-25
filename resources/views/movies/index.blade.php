<x-app-layout>
    <div class="text-white">

        {{-- Search --}}
        <x-search-form title="Search movies"></x-search-form>

        {{-- Add movies --}}
        @auth
            @if (Auth::user()->isRole() == 'admin')
                <a href="/movies/create">Add movie</a><br>
            @endif
        @endauth

        {{-- Filter, Movies and Pagination --}}
        @if(auth()->user())
        @auth
            <movie-list
            profile-id={{ auth()->user()->profile->id }}
            watchlist={{ $watchlistStatus }}
            :show-watchlist="false"
            :show-filter="true"
            :pagination-number="18"
            role={{ Auth::user()->isRole() }} />
        @endauth
        @else
            <movie-list
            :profile-id="null"
            :show-watchlist="false"
            :show-filter="true"
            :pagination-number="18" />
        @endif
</x-app-layout>

