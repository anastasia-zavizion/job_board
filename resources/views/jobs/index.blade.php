<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' =>'#']" />


    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" action="{{route('jobs.index')}}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-bold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text"></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-bold">Salary</div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"></x-text-input>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"></x-text-input>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-bold">Experience</div>
                    <x-radio-group name="experience" :options="App\Models\Job::$experience"/>
                </div>
                <div>
                    <div class="mb-1 font-bold">Category</div>
                    <x-radio-group name="category" :options="App\Models\Job::$category"/>
                </div>
            </div>
            <div>
                <x-button  class="w-full" type="submit">Filter</x-button>
            </div>
        </form>
    </x-card>

   @foreach($jobs as $job)
       <x-job-card class="mb-2" :job="$job">
           <div class="mt-2">
               <x-link-button :href="route('jobs.show',$job->id)">See more</x-link-button>
           </div>
       </x-job-card>
    @endforeach
</x-layout>
