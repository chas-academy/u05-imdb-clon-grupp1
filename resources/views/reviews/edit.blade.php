   <x-app-layout>
       <!-- <div class="max-w-sm w-full lg:max-w-full lg:flex justify-center">
        <div class=" bg-indigo-400 rounded-lg  p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
          <div class="text-gray-900 font-bold text-xl mb-2">{{ $movie->title }}</div>
            <edit-review :id="{{ $review->id }}"></edit-review>
          </div>
          <div class="flex items-center">
            <div class="text-sm">
              <p class="text-gray-900 leading-none">Reviwer Name: {{ $user->username }}</p>
              <p class="text-gray-600">Created at:</p>
              <img class="w-full h-50" src="\storage\images\dunkirk.jpg" alt="bild">
            </div>
          </div>
        </div>
      </div> -->
      <div class="border-b border-gray-800">
            <div class="container mx-auto px-4 py-16 flex">
                <img src="\storage\images\dunkirk.jpg" alt="movie" class="w-96">
                <div class="ml-24 flex flex-col">
                    <h2 class="text-white font-semibold">Edit review</h2>
                    <a href="/movies/{{ $movie->id }}"><h2 class="text-4xl text-white font-semibold hover:text-purple-500">{{$movie->title}}</h2></a>
                    <edit-review :id="{{ $review->id }}"></edit-review>
                    <div class="text">
                        <p class="text-white mt-5">Reviewer Name: <a href="/profile/{{$profile->id}}" class="hover:text-purple-500 ">{{ $user->name }}</a></p>
                    </div>
                </div>
            </div>
      </div>

   </x-app-layout>