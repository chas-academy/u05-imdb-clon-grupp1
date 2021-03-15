@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-700'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-indigo-500 hover:text-indigo-300 hover:border-indigo-500 focus:outline-none focus:text-indigo-900 focus:border-indigo-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
