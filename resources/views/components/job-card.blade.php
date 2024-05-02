<x-card @class(['mb-2', 'opacity-80'=>$job->deleted_at])>
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">
            {{$job->title}}
        </h2>
        <div class="text-slate-500">{{$job->salary_formatted}}</div>
    </div>

    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex gap-2">
            <div>{{$job->employer->company_name}}</div>
            <div>{{$job->location}}</div>
        </div>

        <div class="flex gap-2">
            <x-tag><a href="{{route('jobs.index',[...request()->all(),'experience'=>$job->experience])}}">{{ucfirst($job->experience)}}</a> </x-tag>
            <x-tag><a href="{{route('jobs.index',[...request()->all(),'category'=>$job->category])}}">{{ucfirst($job->category)}}</a></x-tag>
        </div>
    </div>

    {{$slot}}
</x-card>
