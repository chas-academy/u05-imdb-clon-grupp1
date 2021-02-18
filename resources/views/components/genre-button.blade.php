<div>
    <a href={{ $link }}>
        <button class="{{ $randomColor() }} m-1 inline-block px-4 py-2 text-xs font-medium text-center text-white uppercase transition rounded-full shadow hover:shadow-xl hover:bg-gray-900 focus:outline-none">
            {{ $slot }}
        </button>
    </a>
</div>
