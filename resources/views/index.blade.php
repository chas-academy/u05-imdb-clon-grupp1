<x-app-layout>
    <div class="text-white">

        {{-- SEARCH --}}
        <x-search-form title="Find, save and review movies"></x-search-form>

        {{-- SLIDER --}}
        @if(auth()->user())
            @auth
                <movie-slider profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="false" :show-filter="true"></movie-slider>
            @endauth
        @else
            <movie-slider :profile-id="null" :show-watchlist="false" :show-filter="true"></movie-slider>
        @endif

        <div class="flex justify-center mt-1">
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

        {{-- Filter, Movies/Watchlist and Pagination --}}
        @if(auth()->user())
        @auth

            <movie-list profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true"  :show-filter="false" :pagination-number="6"></movie-list>
        @endauth
        @else
            <movie-list :profile-id="null" :show-watchlist="false"  :show-filter="false" :pagination-number="6"></movie-list>
        @endif
</x-app-layout>
