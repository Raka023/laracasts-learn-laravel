<x-layout.home>
    <x-slot:heading>Edit Job : {{ $job->title }}</x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}" novalidate>
        @csrf
        @method('PATCH')
        <input type="hidden" name="employer_id" value="1">
        <div class="space-y-12">
            <div class="border-white/10 pb-12">
                <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-white">Job Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-sky-500">
                                <input id="title" type="text" name="title" placeholder="ex: Web Developer" value="{{ old('title') ?? $job->title }}" required
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
                                <input id="salary" type="text" name="salary" placeholder="ex: $50,000 USD" value="{{ old('salary') ?? $job->salary }}" required
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

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <button form="delete-form" onclick="return confirm('Are you sure?')" class="px-4 py-2 text-sm text-white bg-rose-600 font-semibold rounded-md hover:bg-rose-500 transition cursor-pointer">Delete Job</button>
            </div>
            <div class="space-x-4">
                <a href="/jobs/{{ $job->id }}"
                    class="text-sm/6 px-4 py-2.5 rounded-md font-semibold text-gray-200 hover:text-white hover:bg-gray-800/50 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500 cursor-pointer"
                >Cancel</a>
                <button type="submit"
                    class="rounded-md bg-sky-500 px-3 py-2 text-sm font-semibold text-white hover:bg-sky-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500 cursor-pointer"
                >Update</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout.home>
