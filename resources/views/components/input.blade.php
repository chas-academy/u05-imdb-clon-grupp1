@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' w-full mt-1 mb-2 p-3 rounded-lg bg-gray-800 border-none focus:outline-none text-white']) !!}>
