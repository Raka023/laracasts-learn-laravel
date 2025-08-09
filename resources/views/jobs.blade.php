<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <div class="columns-2 space-y-2">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-300 bg-gray-100 rounded-md hover:bg-zinc-200 transition">
                <div class="font-bold text-sky-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <span class="font-bold">{{ $job['title'] }}</span>: Pays {{ $job['salary'] }} per month
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
