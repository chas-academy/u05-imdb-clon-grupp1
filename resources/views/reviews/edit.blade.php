   <x-app-layout>
       <div class="max-w-sm w-full lg:max-w-full lg:flex justify-center">
        <div class=" bg-indigo-400 rounded-lg  p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
          <div class="text-gray-900 font-bold text-xl mb-2">{{ $movie->title }}</div>
            <edit-review :id="{{ $review->id }}"></edit-review>
          </div>
          <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="/storage/images/dunkirk.jpg" alt="bild">
            <div class="text-sm">
              <p class="text-gray-900 leading-none">Reviwer Name: {{ $user->username }}</p>
              <p class="text-gray-600">Created at:</p>
            </div>
          </div>
        </div>
      </div>

   </x-app-layout>