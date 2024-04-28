<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['Jobs' =>'#']" />
   @foreach($jobs as $job)
       <x-job-card class="mb-2" :job="$job">
           <div class="mt-2">
               <x-link-button :href="route('jobs.show',$job->id)">See more</x-link-button>
           </div>
       </x-job-card>
    @endforeach
</x-layout>
