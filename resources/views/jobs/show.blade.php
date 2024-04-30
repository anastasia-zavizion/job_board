<x-layout>

    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <x-job-card class="mb-2" :job="$job">
        <p class="text-sm text-slate-500 mb-2">{{nl2br($job->description)}}</p>

        @can('apply',$job)
        <x-link-button :href="route('job.application.create',$job)">
            Apply
        </x-link-button>
        @else
            <div class="text-sm text-slate-700 bg-green-100 font-bold p-2 text-center">You already applied to this job </div>
        @endcan
    </x-job-card>

    <x-card>
        <h2 class="font-medium mb-4">More {{$job->employer->company_name}} Jobs</h2>

        <div class="text-sm text-slate-500">
            @foreach($job->employer->jobs as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{route('jobs.show',$otherJob->id)}}">{{$otherJob->title}}</a>
                        </div>
                        <div class="text-xs">{{$otherJob->created_at->diffForHumans()}}</div>
                    </div>
                    <div class="text-xs">{{$otherJob->salary_formatted}}</div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
