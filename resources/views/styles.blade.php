<x-app-layout>

<!--   Review Cards  -->
<div class="max-w-sm w-full lg:max-w-full lg:flex">
    <div class=" bg-indigo-400 rounded-lg  p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
        </div>
        <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="/storage/images/avatar.jpg" alt="bild">
            <div class="text-sm">
                <p class="text-gray-900 leading-none">Reviwer Name</p>
                <p class="text-gray-600">Created at:</p>
            </div>
        </div>
    </div>
</div>

<!--   Movie Cards  -->
<div class="max-w-sm w-full m-10 lg:bg-gray-800 rounded-2xl">
    <div class="rounded-lg p-4 flex relative">
        <div class="bg-indigo-900 w-24 h-36 rounded-2xl">
            <img class="" src="" alt="">
        </div>
        <div class="mt-5 ml-4">
            <button class="w-3 h-3 rounded-full bg-white absolute top-10 right-16 lg:top-4 lg:right-4 transform hover:scale-110"></button>
            <p class="text-white font-bold text-md">Lorem ipsum dolor</p>
            <p class="text-white">2019 - English</p>
            <p class="text-white text-sm">Score:</p>

            <p class="text-gray-400 mt-2 text-sm">Genre, Genre</p>
        </div>
    </div>
</div>


<!--  Button List -->
<div class="m-10 flex flex-col h-96 justify-between align-center">
    {{-- Button-No-Color --}}
    <button class="w-4/5 max-w-xs h-12 bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded-2xl">
        Filter
    </button>

    {{-- Button-Blue --}}
    <button class="w-20 h-10 bg-gradient-to-r from-blue-200 to-blue-400 text-white font-medium py-2 px-4 rounded-lg">
        Score
    </button>

    {{-- Button-Pink --}}
    <button class="w-4/5 max-w-xs h-20 bg-gradient-to-r from-red-400 to-pink-400 text-white text-2xl font-medium py-2 px-4 rounded-2xl">
        Sign up
    </button>

    {{-- Button-Purple --}}
    <button class="w-4/5 max-w-xs h-20 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-2xl font-medium py-2 px-4 rounded-2xl">
        Sign in
    </button>

    {{-- Button-Orange --}}
    <button class="w-4/5 max-w-xs h-20 bg-gradient-to-r from-red-500 to-yellow-200 text-white text-2xl font-medium py-2 px-4 rounded-2xl">
        Submit
    </button>
</div>


<!--  Genre Button List -->
<div class="m-10 flex">
    {{-- Genre-No-Color --}}
    <button class="m-3 bg-indigo-800 hover:bg-indigo-900 px-5 py-3 text-xs font-medium text-white uppercase rounded-full transform scale-100 hover:scale-105 focus:outline-none active:scale-50 transition duration-150 ease-in-out">
        Genre
    </button>

    {{-- Genre-Blue --}}
    <button class="m-3 bg-gradient-to-r from-blue-200 to-blue-400 px-5 py-3 text-xs font-medium text-white uppercase rounded-full transform scale-100 hover:scale-105 focus:outline-none active:scale-50 transition duration-150 ease-in-out">
        Genre
    </button>

    {{-- Genre-Pink --}}
    <button class="m-3 bg-gradient-to-r from-red-400 to-pink-400 px-5 py-3 text-xs font-medium text-white uppercase rounded-full transform scale-100 hover:scale-105 focus:outline-none active:scale-50 transition duration-150 ease-in-out">
        Genre
    </button>

    {{-- Genre-Purple --}}
    <button class="m-3 bg-gradient-to-r from-purple-500 to-blue-500 px-5 py-3 text-xs font-medium text-white uppercase rounded-full transform scale-100 hover:scale-105 focus:outline-none active:scale-50 transition duration-150 ease-in-out">
        Genre
    </button>

    {{-- Genre-Orange --}}
    <button class="m-3 bg-gradient-to-r from-red-500 to-yellow-200 px-5 py-3 text-xs font-medium text-white uppercase rounded-full transform scale-100 hover:scale-105 focus:outline-none active:scale-50 transition duration-150 ease-in-out">
        Genre
    </button>
</div>

<!-- classes for form (label and input) and searchfield -->
<div class="m-10 flex flex-col">

<label for="" class="text-white font-medium mb-2 ml-2">input</label>
<input type="text" class="bg-gray-800 rounded-2xl w-64 px-6 py-4 pl-4 font-normal border-none text-white focus:outline-none focus:shadow-outline" placeholder="class for input">
</div>

</x-app-layout>
