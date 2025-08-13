<x-partial class="">
    <div class="min-h-full">

        <nav x-data="{ openMobile: false }" class="bg-gray-950" @keydown.escape.window="openMobile = false">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=blue&shade=400" alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-ui.nav-link href="/" :active="request()->is('/')">Home</x-ui.nav-link>
                                <x-ui.nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-ui.nav-link>
                                <x-ui.nav-link href="/contact" :active="request()->is('contact')">Contact</x-ui.nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <div class="flex gap-4">
                                    <a href="{{ route('login') }}" class="px-4 py-1.5 border-1 font-semibold bg-gray-900/50 border-gray-700 rounded-md text-sm text-white hover:border-gray-600 hover:bg-gray-800/50 transition">Login</a>
                                    <a href="{{ route('register') }}" class="px-4 py-1.5 font-semibold rounded-md text-sm text-white bg-sky-500 hover:bg-sky-400 transition">Register</a>
                                </div>
                            @endguest

                            @auth 
                                <button type="button"
                                    class="relative rounded-full bg-gray-900 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black focus:outline-hidden">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true" class="size-6">
                                        <path
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
        
                                <!-- Profile dropdown (Alpine.js) -->
                                <div x-data="{ open: false }" class="relative ml-3" @keydown.escape.window="open = false" @click.outside="open = false">
                                    <button
                                        type="button"
                                        @click="open = !open"
                                        :aria-expanded="open.toString()"
                                        aria-haspopup="menu"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-black">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="size-8 rounded-full" />
                                    </button>

                                    <div
                                        x-show="open"
                                        x-transition.origin.top.right
                                        role="menu"
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-800 py-1 shadow-lg ring-1 ring-gray-600/50 focus:outline-hidden"
                                    >
                                        <a href="#" role="menuitem" @click="open = false"
                                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:outline-hidden"
                                        >Your Profile</a>
                                        <a href="#" role="menuitem" @click="open = false"
                                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:outline-hidden"
                                        >Settings</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" role="menuitem" @click="open = false"
                                                class="block px-4 py-2 w-full text-sm text-left text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:outline-hidden cursor-pointer"
                                            >Sign out</button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="openMobile = !openMobile" :aria-expanded="openMobile.toString()" aria-controls="mobile-menu" class="relative inline-flex items-center justify-center rounded-md bg-gray-900 p-2 text-gray-400 hover:bg-gray-800 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black focus:outline-hidden">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg x-show="!openMobile" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <svg x-show="openMobile" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    
            <div id="mobile-menu" class="block md:hidden" x-show="openMobile" x-transition.origin.top>
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-ui.nav-link href="/" :active="request()->is('/')" ui="mobile">Home</x-ui.nav-link>
                    <x-ui.nav-link href="/jobs" :active="request()->is('jobs')" ui="mobile">Jobs</x-ui.nav-link>
                    <x-ui.nav-link href="/contact" :active="request()->is('contact')" ui="mobile">Contact</x-ui.nav-link>
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="size-10 rounded-full" />
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">User</div>
                            <div class="text-sm font-medium text-gray-400">user@example.com</div>
                        </div>
                        <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-900 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black focus:outline-hidden">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                        >Your Profile</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                        >Settings</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                        >Sign out</a>
                    </div>
                </div>
            </div>
        </nav>
    
        <header class="bg-gray-950 shadow-sm border-y border-gray-800">
            <div class="mx-auto max-w-7xl px-4 py-6 lg:px-8 flex items-center justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-white">
                    {{ $heading ?? 'Page Heading' }}
                </h1>
                @if (request()->is('jobs'))
                    <x-ui.button href="/jobs/create">Create Job</x-ui.button>
                @endif
            </div>
        </header>
    
        <main class="bg-gray-950">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
        
    </div>
</x-partial>