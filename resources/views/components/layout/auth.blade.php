<x-partial>
    <div class="flex min-h-full flex-col items-center justify-center px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=blue&shade=400" alt="Your Company"
                class="mx-auto h-10 w-auto" />
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-white">{{ $title }}</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            {{ $slot }}
        </div>

    </div>
</x-partial>
