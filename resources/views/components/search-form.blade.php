<div>
    <div class="flex flex-col justify-center items-center">
        @if($title != null)
        <h1 class="text-3xl font-medium p-7">{{ $title }}</h1>
        @endif
        <form class="w-4/5 max-w-screen-xl relative" action="{{route('search')}}" method="GET">
            <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold text-lg focus:outline-none shadow-lg border-l-0 border-b-0 border-gray-700 border-opacity-50" placeholder="Search movies..." value="" name="query" id="query">
            <button type="submit" value="submit">
                <x-search-icon/>
            </button>
        </form>
    </div>
</div>
