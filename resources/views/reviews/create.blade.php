<x-app-layout>
    <div class="text-white">

        <div class="w-screen flex justify-center mt-5">
            <div class="flex flex-col lg:flex-row justify-center w-10/12 max-w-screen-xl">
                <img class="height object-cover rounded-2xl lg:h-full lg:w-4/5 lg:max-w-md shadow-md border-r border-t border-gray-800 border-opacity-50" src="{{$movie->moviePoster()}}"/>

                <div class="lg:ml-10 flex justify-between w-full">
                    <div class="mt-10  w-full">

                        <p class="text-2xl lg:text-3xl mb-5 w-full ml-1">Create review</p>

                        <div class="flex items-center text-sm font-medium my-5 sm:mt-2 sm:mb-4">
                            <svg width="20" height="20" fill="currentColor" class="text-yellow-600">
                                <path d="M9.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.381-1.81.587-1.81H7.03a1 1 0 00.95-.69L9.05 3.69z" />
                            </svg>
                            <div class="ml-1 text-white">
                                <span>{{ $movie->top_rating }}</span>
                                <span class="sm:hidden md:inline">({{ $totalReviews }})</span>
                            </div>
                            <div class="text-base font-normal mx-2">·</div>
                            <div class="text-white">{{ $movie->title }}</div>
                        </div>
                        <create-review :movie="{{ $movie }}" :review="{{ $review }}"></create-review>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
