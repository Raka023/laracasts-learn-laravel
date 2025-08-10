<x-layout>
    <x-slot:heading>Job Info</x-slot:heading>
    <h1 class="font-semibold text-white text-2xl mb-4">{{ $job['title'] }}</h1>
    <p class="text-gray-300">Pays {{ $job['salary'] }} per month</p>
</x-layout>
