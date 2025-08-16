<x-layout.home>
    <x-slot:heading>Job Info</x-slot:heading>

    <h3 class="font-semibold text-sky-400 text-lg mb-2">{{ $job->employer->name }}</h3>
    <h1 class="font-semibold text-white text-2xl mb-4">{{ $job->title }}</h1>

    <p class="text-gray-300">Pays {{ $job->salary }} per month</p>

    @can('edit', $job)
        <div class="mt-4 flex justify-end gap-3">
            <x-ui.button href="/jobs/{{ $job->id }}/edit" class="text-sm">Edit Job</x-ui.button>
        </div>
    @endcan

</x-layout.home>
