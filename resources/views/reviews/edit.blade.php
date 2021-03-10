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
      <!-- <div class="border-b border-gray-800 overflow-hidden">
            <div class="container lg:mx-auto lg:px-4 lg:py-16 lg:flex lg:flex-row sm:flex sm:flex-row sm:items-center">
                <img src="\storage\images\dunkirk.jpg" alt="movie" class="lg:w-96 sm:w-10 sm:w-40">
                <div class="ml-24 flex flex-col">
                    <h2 class="text-white font-semibold">Edit review</h2>
                    <a href="/movies/{{ $movie->id }}"><h2 class="text-4xl text-white font-semibold hover:text-purple-500">{{$movie->title}}</h2></a>
                    <edit-review :id="{{ $review->id }}"></edit-review>
                    <div class="text">
                        <p class="text-white mt-5">Reviewer Name: <a href="/profile/{{$profile->id}}" class="hover:text-purple-500 ">{{ $user->name }}</a></p>
                    </div>
                </div>
            </div>
      </div> -->
  <!-- <div class="lg:h-screen lg:flex lg:items-center lg:justify-center ">
  
  <div class="flex justify-center align-center  lg:min-w-full">
  <div class="max-w-sm rounded bg-white shadow-lg lg:flex lg:flex-row lg:mr-20 ">
    <img class="w-full" src="\storage\images\dunkirk.jpg" alt="Sunset in the mountains">
    <div class="px-6 py-4 lg:bg-none">
      <div class="font-bold text-2xl mb-2 lg:text-white"><a href="/movies/{{ $movie->id }}" class="hover:text-purple-500">{{$movie->title}}</a></div>
      <p class="text-gray-700 text-base">
      <edit-review :id="{{ $review->id }}"></edit-review>
      </p>
      <div class="text">
        <p class="text-white mt-5">Reviewer Name: <a href="/profile/{{$profile->id}}" class="hover:text-purple-500 ">{{ $user->name }}</a></p>
      </div>
    </div>

  </div>
  </div>
  </div> -->
  
  <div class="grid grid-cols-1 sm:grid-cols-2 sm:px-8 sm:py-12 sm:gap-x-8 md:py-16">
    <div class="relative z-10 col-start-1 row-start-1 sm:col-start-2 sm:row-span-3 px-4 pt-40 pb-3 bg-gradient-to-t from-black sm:bg-none">
      <p class="text-sm font-medium text-white sm:mb-1 sm:text-gray-500">Edit review</p>
      <h2 class="text-xl font-semibold text-white sm:text-2xl sm:leading-7 sm:text-white md:text-3xl"><a href="/movies/{{ $movie->id }}" class="hover:text-purple-500">{{$movie->title}}</a></h2>
    </div>
    <div class="col-start-1 row-start-2 sm:col-start-2 sm:row-span-3 px-4 sm:pb-16">
      <div class="flex items-center text-sm font-medium my-5 sm:mt-2 sm:mb-4">
        <svg width="20" height="20" fill="currentColor" class="text-yellow-600">
          <path d="M9.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.381-1.81.587-1.81H7.03a1 1 0 00.95-.69L9.05 3.69z" />
        </svg>
        <div class="ml-1 text-white">
          <span>4.94</span>
          <span class="sm:hidden md:inline">(128)</span>
        </div>
        <div class="text-base font-normal mx-2">·</div>
        <div class="text-white">Collingwood, Ontario</div>
      </div>
      <hr class="w-16 border-gray-300 hidden sm:block mb-5">
      <edit-review :id="{{ $review->id }}"></edit-review>
    </div>
    <div class="col-start-1 row-start-3 sm:col-start-2 sm:row-span-3 space-y-3 px-4">
      <p class="flex items-center text-white text-sm font-medium">
        <img src="\storage\images\avatar.jpg" alt="" class="w-6 h-6 rounded-full mr-2 bg-gray-100">
        <a href="/profile/{{$profile->id}}" class="hover:text-purple-500 ">{{ $user->name }}</a>
      </p>
    </div>
    <div class="col-start-1 row-start-1 flex sm:col-start-1 sm:row-span-6 sm:row-start-1">
      <div class="w-full grid grid-cols-3 grid-rows-2 gap-2">
        <div class="relative col-span-3 row-span-2 md:col-span-2">
          <img src="\storage\images\dunkirk.jpg" alt="" class="absolute inset-0 w-full h-full object-cover bg-gray-100 sm:rounded-lg" />
        </div>
      </div>
    </div>
</div>

</x-app-layout>