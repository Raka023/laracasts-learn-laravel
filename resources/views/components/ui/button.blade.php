<a {{ $attributes->merge([
    'class' => 'px-4 py-1.5 font-semibold text-white bg-sky-500 rounded-lg hover:bg-sky-400 transition cursor-pointer'
]) }}>{{ $slot }}</a>
