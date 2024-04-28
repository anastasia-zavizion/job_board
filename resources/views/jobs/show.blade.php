<x-layout>

    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <x-job-card class="mb-2" :job="$job">
    </x-job-card>
</x-layout>
