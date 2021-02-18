<x-app-layout>
    <div class="mt-10 flex flex-wrap max-w-xl mx-auto">
        @foreach ($genres as $genre)
        <x-genre-button link="#" >{{ __($genre->genre_name) }}</x-genre-button>
        @endforeach
    </div>
</x-app-layout>
