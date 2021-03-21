<x-app-layout>
    <div class="text-white">
        <div class="flex flex-col justify-center items-center">

            {{-- USER INFO --}}
            <div class="flex justify-between w-4/5 max-w-screen-xl  pr-1 py-5">
                <h1 class="text-3xl font-medium my-auto w-52">{{$user->profile->title}}</h1>
                <img src="{{$user->profile->profileImage()}}" class="w-11 h-11 rounded-full ">
            </div>

            @can('update', $user->profile)
                <div class="flex w-4/5 max-w-screen-xl pb-8">
                    <a href="/profile/{{$user->profile->id}}/edit" class="py-2 px-3 rounded-lg bg-indigo-900 transform hover:scale-105">Edit Profile</a>
                </div>
            @endcan

            {{-- SEARCH --}}
            <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none focus:shadow-outline shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies...">
                <button>
                    <x-search-icon/>
                </button>
            </form>
        </div>

        {{-- SLIDER --}}
        <movie-slider profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true"></movie-slider>
        <div class="flex justify-center">
            <p class="w-screen max-w-screen-2xl pr-3">
                <a href="/watchlist/{{ auth()->user()->profile->id }}" class="float-right py-2 px-3 rounded-lg bg-indigo-900 transform hover:scale-105">Watchlist</a>
            </p>
        </div>

        {{-- Move to user.blade --}}
        @if (Route::has('login'))
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-dropdown-link>
                </form>
            @endauth
        @endif
    </div>
</x-app-layout>
