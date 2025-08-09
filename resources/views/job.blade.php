<x-layout>
    <x-slot:heading>Job Info</x-slot:heading>
    <h1 class="font-semibold">{{ $job['title'] }}</h1>
    <p>Pays {{ $job['salary'] }} per month</p>
</x-layout>
