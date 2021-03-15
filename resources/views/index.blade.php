<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-white text-3xl font-medium p-7">Find, save and review movies</h1>

        <form class="w-4/5 max-w-screen-xl relative">
                <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold border-none text-lg text-white focus:outline-none focus:shadow-outline" placeholder="Search movies...">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="136pt" version="1.1" viewBox="-1 0 136 136.21852" width="136pt" class="absolute w-5 h-5 right-6 top-5">
                        <g id="surface1">
                        <path style="fill:#ffffff;"  d="M 93.148438 80.832031 C 109.5 57.742188 104.03125 25.769531 80.941406 9.421875 C 57.851562 -6.925781 25.878906 -1.460938 9.53125 21.632812 C -6.816406 44.722656 -1.351562 76.691406 21.742188 93.039062 C 38.222656 104.707031 60.011719 105.605469 77.394531 95.339844 L 115.164062 132.882812 C 119.242188 137.175781 126.027344 137.347656 130.320312 133.269531 C 134.613281 129.195312 134.785156 122.410156 130.710938 118.117188 C 130.582031 117.980469 130.457031 117.855469 130.320312 117.726562 Z M 51.308594 84.332031 C 33.0625 84.335938 18.269531 69.554688 18.257812 51.308594 C 18.253906 33.0625 33.035156 18.269531 51.285156 18.261719 C 69.507812 18.253906 84.292969 33.011719 84.328125 51.234375 C 84.359375 69.484375 69.585938 84.300781 51.332031 84.332031 C 51.324219 84.332031 51.320312 84.332031 51.308594 84.332031 Z M 51.308594 84.332031 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
                        </g>
                    </svg>
                </button>
        </form>
    </div>

    <movie-slider></movie-slider>

    <h2 class="text-white text-xl font-medium pt-2 pl-5 max-w-xl mx-auto">Genre</h2>
    <div class=" flex flex-wrap px-3 max-w-xl mx-auto">
        @foreach ($genres as $genre)
        <x-genre-button link="/genres/{{$genre->id}}">{{ __($genre->name) }}</x-genre-button>
        @endforeach
    </div>

    {{-- Move to user.blade --}}
    {{-- @if (Route::has('login'))
    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </x-dropdown-link>
    </form>
    @endauth
    @endif --}}

</x-app-layout>
