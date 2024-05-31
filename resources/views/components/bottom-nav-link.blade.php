@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex flex-col items-center justify-center px-5 bg-gray-50 dark:hover:bg-gray-800 text-blue-600
dark:bg-gray-800 group
'
: 'inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-500
dark:text-gray-400 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>