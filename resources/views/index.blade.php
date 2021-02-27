<x-app-layout>
    <div class="mt-10 flex flex-wrap max-w-xl mx-auto">
        @foreach ($genres as $genre)
        <x-genre-button link="/genres/{{$genre->id}}" >{{ __($genre->name) }}</x-genre-button>
        @endforeach
    </div>

     {{-- Move to user.blade --}}
     @if (Route::has('login'))
     @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </x-dropdown-link>
    </form>
    @endauth
    @endif

</x-app-layout>
