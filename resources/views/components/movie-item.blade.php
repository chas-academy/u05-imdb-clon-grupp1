<div>
  {{-- {{ $id }}
  {{ $title }}
  {{ $releseDate }}
  {{ $language }}
  {{ $img }} --}}

  <div class="max-w-sm w-full m-10 lg:bg-gray-800 rounded-2xl">
    <div class="rounded-lg flex relative">
        <img class="w-24 h-36 rounded-2xl bg-cover" src="/storage/{{ $img }}" alt="{{ $title }}">

        <div class="mt-5 ml-4">
            <button class="w-3 h-3 rounded-full bg-white absolute top-10 right-16 lg:top-4 lg:right-4 transform hover:scale-110"></button>
            <p class="text-white font-bold text-md"> {{ $title }}</p>
            <p class="text-white">{{ $releseDate }} - {{ $language }}</p>
            <p class="text-white text-sm">Score:</p>

            <p class="text-gray-400 mt-2 text-sm">Genre, Genre</p>
        </div>
    </div>
</div>
</div>
