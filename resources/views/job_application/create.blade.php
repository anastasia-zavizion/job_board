<x-layout>
<x-card>
    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job->id), 'Apply'=>'#']" />
    <x-job-card :$job>

    </x-job-card>

    <x-card>
        <h2 class="font-medium mb-4">Your Job Application</h2>
        <form enctype="multipart/form-data" method="POST" action="{{route('job.application.store',$job)}}">
            @csrf
            <div class="mb-4">
                <x-label :required="true"  for="expected_salary" text="Expected salary"/>
                <x-text-input type="number" name="expected_salary"/>
            </div>
            <div class="mb-4">
                <x-label :required="true" for="cv" text="Your CV file"/>
                <x-text-input type="file" name="cv"/>
            </div>
            <div>
                <x-button type="submit">Apply</x-button>
            </div>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </form>
    </x-card>
</x-card>
</x-layout>
