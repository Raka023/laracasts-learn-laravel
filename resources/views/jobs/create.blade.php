<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs" novalidate>
        @csrf
        <input type="hidden" name="employer_id" value="1">
        <div class="space-y-12">
            <div class="border-white/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Create a new job</h2>
                <p class="mt-1 text-sm/6 text-gray-400"
                >We just need some handful of details from you.</p>

                <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-white">Job Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-sky-500">
                                <input id="title" type="text" name="title" placeholder="ex: Web Developer" value="{{ old('title') }}" required
                                    class="block w-full grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm/6 text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8">
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-white">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-sky-500">
                                <input id="salary" type="text" name="salary" placeholder="ex: $50,000 USD" value="{{ old('salary') }}" required
                                    class="block w-full grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                        </div>
                        @error('salary')
                            <p class="mt-2 text-sm/6 text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-white/20 mb-8">

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button"
                class="text-sm/6 font-semibold text-gray-200 hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500 cursor-pointer"
            >Cancel</button>
            <button type="submit"
                class="rounded-md bg-sky-500 px-3 py-2 text-sm font-semibold text-white hover:bg-sky-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500 cursor-pointer"
            >Save</button>
        </div>
    </form>

</x-layout>
