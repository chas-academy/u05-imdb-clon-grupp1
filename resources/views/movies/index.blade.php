<x-app-layout>
    <div class="text-white">

          {{-- Search --}}
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl font-medium p-7">Movies</h1>
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

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


        {{-- @auth
            @if (Auth::user()->isRole() == 'admin')
                <a href="/movies/{{ $movie->id }}/edit">Edit Movie</a>
                <form method="POST" action="/movies/{{ $movie->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="delete">Delete movie</button>
                </form><br>
            @endif
        @endauth --}}

</x-app-layout>

