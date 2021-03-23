<x-app-layout>

<div class="grid grid-cols-1 sm:grid-cols-2 sm:px-8 sm:py-12 sm:gap-x-8 md:py-16">
    <div class="relative z-10 col-start-1 row-start-1 sm:col-start-2 sm:row-span-3 px-4 pt-40 pb-3 bg-gradient-to-t from-black sm:bg-none">
      <p class="text-sm font-medium text-white sm:mb-1 sm:text-gray-500">Create review</p>
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
      <create-review :movie="{{ $movie }}" :review="{{ $review }}"></create-review>
    </div>

    <div class="col-start-1 row-start-1 flex sm:col-start-1 sm:row-span-6 sm:row-start-1">
      <div class="w-full grid grid-cols-3 grid-rows-2 gap-2">
        <div class="relative col-span-3 row-span-2 md:col-span-2">
          <img src="" alt="" class="absolute inset-0 w-full h-full object-cover bg-gray-100 sm:rounded-lg" />
        </div>
      </div>
    </div>
</div>

</x-app-layout>
