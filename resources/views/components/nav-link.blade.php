@props([
    'active' => false,
    'ui' => 'desktop',
])

@if ($ui == 'mobile')
    <a aria-current="{{ $active ? 'page' : false }}"
        class="{{ $active ? 'bg-gray-900 text-white border-l-4 border-sky-500' : 'text-gray-200 hover:bg-gray-900/75 hover:text-white' }} block rounded-md px-3 py-2 text-base font-semibold"
        {{ $attributes }}
    >{{ $slot }}</a>
@else
    <a aria-current="{{ $active ? 'page' : false }}"
        class="{{ $active ? 'bg-gray-900 text-white border-b-2 border-sky-400' : 'text-gray-200 hover:bg-gray-900/75 hover:text-white' }} rounded-md px-3 py-2 text-sm font-semibold"
        {{ $attributes }}
    >{{ $slot }}</a>
@endif
