<x-layout.home>
    <x-slot:heading>Job Listings</x-slot:heading>

    @if ($jobs->isEmpty())
        <p class="text-white text-center text-lg font-semibold">No jobs found</p>
    @endif

    <div class="space-y-2">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block px-4 py-6 text-white border border-gray-800 bg-gray-900 rounded-md hover:bg-gray-700/50 transition">
                <div class="font-bold text-sky-400 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <span class="font-bold">{{ $job->title }}</span>: Pays {{ $job->salary }} per month
                </div>
            </a>
        @endforeach

        <div class="mt-4">
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout.home>
