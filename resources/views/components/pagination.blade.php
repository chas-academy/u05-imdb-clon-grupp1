<div>
    <div class="flex justify-center mt-2">
        @if ($currentPage != 1)
        <a href="{{ $previousPageUrl }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1 hover:bg-gray-700">Prev</a>
        @else
        <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1">Prev</a>
        @endif
        @for ($i = $currentPage; $i <= $lastPage &&  $i != $currentPage + 5; $i++)
            <a href="{{ 'http://127.0.0.1:8000?page=' . $i }}" class="p-4  rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1 {{ ($currentPage == $i) ? 'bg-gray-700 hover:bg-gray-600' : 'bg-gray-800 hover:bg-gray-700' }}">{{ $i }}</a>
        @endfor
        @if ($currentPage != $lastPage)
        <a href="{{ $nextPageUrl }}" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1 hover:bg-gray-700">Next</a>
        @else
        <a class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</a>
        @endif
    </div>
</div>
