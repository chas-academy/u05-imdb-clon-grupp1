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
                    @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="py-2 px-3 ml-3 rounded-lg bg-indigo-900 transform hover:scale-105">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                        </form>
                    @endauth
                    @endif
                </div>
            @endcan

            {{-- SEARCH --}}
        </div>
        <x-search-form :title="null"></x-search-form>

        {{-- SLIDER --}}
        @if(count(auth()->user()->profile->movies) > 10)
        <movie-slider profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="true" :show-filter="false"></movie-slider>
        <div class="flex justify-center mt-1">
            <p class="w-screen max-w-screen-2xl pr-3">
                <a href="/watchlist/{{ auth()->user()->profile->id }}" class="float-right py-2 px-3 rounded-lg bg-indigo-900 transform hover:scale-105">Watchlist</a>
            </p>
        </div>
        @else
            <movie-slider profile-id={{ auth()->user()->profile->id }} watchlist={{ $watchlistStatus }} :show-watchlist="false" :show-filter="false"></movie-slider>
            <div class="flex justify-center mt-1">
                <p class="w-screen max-w-screen-2xl pr-3">
                    <a href="/watchlist/{{ auth()->user()->profile->id }}" class="float-right py-2 px-3 rounded-lg bg-indigo-900 transform hover:scale-105">Watchlist</a>
                </p>
            </div>
        @endif
    </div>
</x-app-layout>
