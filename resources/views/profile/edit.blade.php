<x-app-layout >
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
            <form action="/profile/{{ $user->profile->id }}" method="POST" enctype="multipart/form-data" class="text-white">
                @csrf
                @method('PATCH')

                <x-label for="title">Username</x-label>

                <x-input type="text" id="title" name="title" :value="old('title') ?? $user->profile->title"/>
                @if ($errors->has('title'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <x-label for="name">Profile image</x-label>
                <x-input type="file" id="title" name="image"/>
                @if ($errors->has('title'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif

                <x-button type="submit" class=" mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>
