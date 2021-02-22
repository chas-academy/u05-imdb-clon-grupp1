<x-app-layout>
    <div class="mt-10 flex flex-wrap max-w-xl mx-auto">
        @foreach ($genres as $genre)
        <x-genre-button link="#" >{{ __($genre->name) }}</x-genre-button>
        @endforeach
    </div>

  {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </x-dropdown-link>
    </form>   --}}
</x-app-layout>
