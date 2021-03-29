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

        <div class="flex justify-center mt-16">
            <div class="w-10/12 max-w-screen-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-y-6 my-10">
                    @foreach ($reviews as $review)

                    <div class="bg-gray-800 xs:w-full xs:w-96 md:w-11/12 py-4 px-4 rounded-xl mx-auto shadow-md border-r border-gray-700 border-opacity-50 relative pb-10">
                        <p class="float-right"> {{ $review->user->username }}</p>
                        <img class=" rounded-full h-10 w-10" src="{{ $review->user->profile->profileImage() }}">
                        <p class="w-full break-words mt-4 mb-3">{{ $review->review }}</p>
                        <p class="absolute bottom-3 left-4"><b>Score: </b>{{ $review->rating }}</p>
                        @can('update', $review)
                        <a class="absolute bottom-3 right-20 bg-gray-700 px-2 py-1 rounded-md" href="/reviews/{{ $review->id }}/edit">Edit</a>
                        @endcan
                        @can('update', $review)
                        <form class="absolute bottom-3 right-3 bg-gray-900 px-2 py-1 rounded-md" action="{{ route('reviews.destroy', $review->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete">Delete</button>
                        </form>
                        @endcan
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if( $reviews->lastPage() != 1)
        <div class="flex justify-center mt-2">
            @if ($reviews->currentPage() != 1)
            <a href="{{ $reviews->previousPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1 hover:bg-gray-700">Prev</a>
            @else
            <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1">Prev</a>
            @endif
            @for ($i = $reviews->currentPage(); $i <= $reviews->lastPage() &&  $i != $reviews->currentPage() + 5; $i++)
                <a href="{{ 'http://127.0.0.1:8000/profile/'.$user->id.'?page='.$i }}" class="p-4  rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1 {{ ($reviews->currentPage() == $i) ? 'bg-gray-700 hover:bg-gray-600' : 'bg-gray-800 hover:bg-gray-700' }}">{{ $i }}</a>
            @endfor
            @if ($reviews->currentPage() != $reviews->lastPage())
            <a href="{{ $reviews->nextPageUrl() }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1 hover:bg-gray-700">Next</a>
            @else
            <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</a>
            @endif
        </div>
        @endif
    </div>
</x-app-layout>
