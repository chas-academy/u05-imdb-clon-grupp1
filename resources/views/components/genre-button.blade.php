<div>
    <a href={{ $link }}>
        <button class="{{ $randomColor() }} m-1 inline-block px-4 py-2 text-xs font-medium text-center text-white uppercase rounded-full shadow-md transform scale-100 hover:scale-105 hover:shadow-xl focus:outline-none active:scale-50 transition duration-150 ease-in-out">
            {{ $slot }}
        </button>
    </a>
</div>
