<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-3xl font-medium p-7 text-white">Edit movie</h1>
            </div>
            <form action="/movies/{{ $movie->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-label for="title">Title</x-label>
                <x-input type="text" id="title" name="title" :value="old('title') ?? $movie->title"/>
                @if ($errors->has('title'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif

                <x-label for="description">Description</x-label>
                <x-input type="text" id="description" name="description" :value="old('description') ?? $movie->description"/>
                @if ($errors->has('description'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif

                <x-label for="actors">Actors</x-label>
                <x-input type="text" id="actors" name="actors" :value="old('actors') ?? $movie->actors" />

                @if ($errors->has('actors'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('actors') }}</strong>
                    </span>
                @endif

                <x-label for="language">Language</x-label>
                <x-input type="text" id="language" name="language" :value="old('language') ?? $movie->language" />
                @if ($errors->has('language'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('language') }}</strong>
                    </span>
                @endif

                <x-label for="release_date">Release Date</x-label>
                <x-input type="text" id="release_date" name="release_date"
                    :value="old('release_date') ?? $movie->release_date" />
                @if ($errors->has('release_date'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('release_date') }}</strong>
                    </span>
                @endif

                <x-label for="img_path">Add movie image url</x-label>
                <x-input type="file" id="img_path" name="img_path" />
                @if ($errors->has('img_path'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('img_path') }}</strong>
                    </span>
                @endif

                <x-label for="trailer_path">Add movie trailer url</x-label>
                <x-input type="url" id="trailer_path" name="trailer_path" :value="old('trailer_path') ?? $movie->trailer_path" />
                @if ($errors->has('trailer_path'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('trailer_path') }}</strong>
                    </span>
                @endif

                <x-label class="mt-2 mb-1">Select Genres</x-label>
                @foreach ($genres as $genre)
                <input class="float-right" name="genres[]" value="{{ $genre->name }}" type="checkbox" id="{{ $genre->id }}">
                <label class="block font-medium text-sm text-white cursor-pointer" for="{{ $genre->id }}">{{ $genre->name }}</label>
                @endforeach
                @if ($errors->has('genres'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('genres') }}</strong>
                    </span>
                @endif
                <x-button type="submit" class=" mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>

            <form method="POST" action="/movies/{{ $movie->id }}">
                @csrf
                @method('DELETE')
                {{-- <button type="submit" name="delete">Delete movie</button> --}}
                <x-button type="submit" name="delete" class=" mt-3">
                    {{ __('Delete movie') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>

