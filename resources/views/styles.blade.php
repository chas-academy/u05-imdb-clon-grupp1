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
<form class="w-screen flex justify-center my-4 ">
    <div class="relative w-4/5">
        <input type="text" class="bg-gray-800 w-full rounded-2xl px-6 py-4 pl-4 font-bold border-none text-lg text-white focus:outline-none focus:shadow-outline" placeholder="Search movies...">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" height="136pt" version="1.1" viewBox="-1 0 136 136.21852" width="136pt" class="absolute w-5 h-5 right-6 top-5">
                <g id="surface1">
                <path style="fill:#ffffff;"  d="M 93.148438 80.832031 C 109.5 57.742188 104.03125 25.769531 80.941406 9.421875 C 57.851562 -6.925781 25.878906 -1.460938 9.53125 21.632812 C -6.816406 44.722656 -1.351562 76.691406 21.742188 93.039062 C 38.222656 104.707031 60.011719 105.605469 77.394531 95.339844 L 115.164062 132.882812 C 119.242188 137.175781 126.027344 137.347656 130.320312 133.269531 C 134.613281 129.195312 134.785156 122.410156 130.710938 118.117188 C 130.582031 117.980469 130.457031 117.855469 130.320312 117.726562 Z M 51.308594 84.332031 C 33.0625 84.335938 18.269531 69.554688 18.257812 51.308594 C 18.253906 33.0625 33.035156 18.269531 51.285156 18.261719 C 69.507812 18.253906 84.292969 33.011719 84.328125 51.234375 C 84.359375 69.484375 69.585938 84.300781 51.332031 84.332031 C 51.324219 84.332031 51.320312 84.332031 51.308594 84.332031 Z M 51.308594 84.332031 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
                </g>
            </svg>
        </button>
    </div>
</form>

</x-app-layout>
