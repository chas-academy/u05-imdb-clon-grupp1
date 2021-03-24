<x-app-layout>

<div class="text-white">
    {{-- SEARCH --}}
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl font-medium p-7">Find, save and review movies</h1>
        <form class="w-4/5 max-w-screen-xl relative" action="{{route('search')}}" method="GET">
            <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies..." value="{{request()->input('query')}}" name="query" id="query">
            <button>
                <x-search-icon/>
            </button>
            </form>
    </div>
    {{-- MOVIES RESULT --}}
    <div>
         <div class="flex flex-col justify-center items-center">
            <div class="w-full max-w-screen-xl p-6 ">
                <div class="md:mx-auto md:grid md:grid-cols-2 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 ">
                    @foreach ($movies as $movie)
                        <div class="max-w-sm w-full md:bg-gray-800 rounded-2xl my-4 md:mb-7 md:shadow-lg md:border-r md:border-gray-700 md:border-opacity-50 relative">
                            <a href="/movies/{{ $movie->id }}">
                                <div class="flex">
                                    <img class="w-24 h-36 rounded-2xl object-cover md:shadow-md md:border-r md:border-gray-900 md:border-opacity-50" src="/storage/{{ $movie->img_path }}" alt="{{$movie->title}}">
                                    <div class="mt-5 ml-4">
                                        <p class="text-white font-bold text-md"> {{ $movie->title }}</p>
                                        <p class="text-white">{{ $movie->release_date }} - {{ $movie->language }}</p>
                                        <p class="text-white text-sm">Rating: {{ $movie->top_rating }}</p>
                                        <p class="text-gray-400 mt-2 text-sm">{{ $movie->movie_genres}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
