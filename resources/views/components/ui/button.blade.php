<a {{ $attributes->merge([
    'class' => 'px-4 py-1.5 text-white bg-sky-500 font-semibold rounded-md hover:bg-sky-400 transition cursor-pointer'
]) }}>{{ $slot }}</a>
