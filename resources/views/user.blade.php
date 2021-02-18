{{-- REMOVE LATER --}}
<x-app-layout>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </x-dropdown-link>
    </form>
</x-app-layout>
