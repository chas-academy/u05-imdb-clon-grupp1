@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pr-6 py-2 border-r-4 border-l-4 border-indigo-900 text-base font-medium text-white focus:outline-none transition duration-150 ease-in-out text-right'
            : 'block pr-6 py-2 text-base font-medium text-indigo-900 hover:text-indigo-500 hover:indigo-300 focus:outline-none transition duration-150 ease-in-out text-right';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
