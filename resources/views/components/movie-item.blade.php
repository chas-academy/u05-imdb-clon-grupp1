<div>
    <div class="max-w-sm w-full md:bg-gray-800 rounded-2xl my-4 md:mb-7 md:shadow-lg md:border-r md:border-gray-700 md:border-opacity-50">
            <div class="rounded-lg flex relative">
                <a href="/movies/{{ $id }}"><img class="w-24 h-36 rounded-2xl object-cover md:shadow-md md:border-r md:border-gray-900 md:border-opacity-50" src="/storage/{{ $img }}" alt="{{ $title }}"></a>

                <div class="mt-5 ml-4">
                    @auth
                    <watchlist-button  movie-id="{{ $id }}" watchlist="{{ str_contains($watchlistStatus, ',' . $id . ',') }}" class="absolute top-5 right-5 w-6 h-6" ></watchlist-button>
                    @endauth
                    <a href="/movies/{{ $id }}"><p class="text-white font-bold text-md"> {{ $title }}</p></a>
                    <p class="text-white">{{ $releseDate }} - {{ $language }}</p>
                    <p class="text-white text-sm">Rating: {{ $rating }}</p>

                    <p class="text-gray-400 mt-2 text-sm">{{ $genres }}</p>
                </div>
            </div>
    </div>
</div>
