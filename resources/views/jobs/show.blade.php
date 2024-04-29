<x-layout>

    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <x-job-card class="mb-2" :job="$job">
        <p class="text-sm text-slate-500">{{nl2br($job->description)}}</p>
    </x-job-card>
</x-layout>
