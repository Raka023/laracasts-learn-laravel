<x-mail::message>
# Your Job is now live on out website!

Check it out now!

<x-mail::button :url="route('jobs.show', $job->id)">
    View your job listing
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
