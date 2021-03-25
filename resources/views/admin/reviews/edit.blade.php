<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-3xl font-medium p-7 text-white">Edit Review for <br> {{ $movie->title }} by {{ $user->username }}</h1>
            </div>
            <form action="/admin/review-update/{{ $review->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-label for="id">ID</x-label>
                <x-input name="id" value="{{ $review->id }}" disabled />

                <x-label for="review">Review</x-label>
                <x-input type="text" id="review" name="review" :value="old('review') ?? $review->review" />
                @if ($errors->has('review'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('review') }}</strong>
                </span>
                @endif

                <x-label for="rating">Rating</x-label>
                <x-input type="text" id="rating" name="rating" :value="old('rating') ?? $review->rating" />
                @if ($errors->has('rating'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('rating') }}</strong>
                </span>
                @endif

                <x-button type="submit" class=" mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>

            <form method="POST" action="/admin/review/{{ $review->id }}">
                @csrf
                @method('DELETE')
                {{-- <button type="submit" name="delete">Delete review</button> --}}
                <x-button type="submit" name="delete" class=" mt-3">
                    {{ __('Delete review') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>