<x-layout.auth>
    <x-slot:title>Sign in to your account</x-slot:title>

    <form action="/register" method="POST" class="space-y-4" novalidate>
        @csrf
        <div>
            <label for="name" class="block text-sm/6 font-medium text-gray-100">Name</label>
            <div class="mt-2">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-500 sm:text-sm/6" />
            </div>
        </div>
        @error('name')
            <p class="text-sm/6 text-rose-500">{{ $message }}</p>
        @enderror

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
            <div class="mt-2">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-500 sm:text-sm/6" />
            </div>
        </div>
        @error('email')
            <p class="text-sm/6 text-rose-500">{{ $message }}</p>
        @enderror

        <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
            <div class="mt-2">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-500 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-100">Confirm Password</label>
            <div class="mt-2">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-500 sm:text-sm/6" />
            </div>
        </div>
        @error('password')
            <p class="text-sm/6 text-rose-500">{{ $message }}</p>
        @enderror

        <hr class="border-white/20 my-6">

        <div>
            <label for="employer" class="block text-sm/6 font-medium text-gray-100">Employer Name</label>
            <div class="mt-2">
                <input id="employer" type="employer" name="employer" required autocomplete="employer"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-500 sm:text-sm/6" />
            </div>
        </div>
        @error('employer')
            <p class="text-sm/6 text-rose-500">{{ $message }}</p>
        @enderror

        <div class="mt-8">
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-sky-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-sky-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500"
            >Sign Up</button>
        </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-400">
        Already have an account? <a href="{{ route('login') }}" class="font-semibold text-sky-400 hover:text-sky-300">Sign in</a>
    </p>
</x-layout.auth>