@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-lg bg-gray-800 border-none focus:outline-none text-white']) !!}>
