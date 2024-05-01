<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Applications'=>'#']"/>

    @forelse($applications as $application)

        <x-job-card :job="$application->job">

            <div class="flex gap-2 justify-between">
               <div>
                   <div class="flex gap-2 justify-between">
                       <div>Job applications amount</div>
                       <div>{{$application->job->job_applications_count}}</div>
                   </div>

                   <div class="flex gap-2 justify-between">
                       <div>Avarage expected salary</div>
                       <div>$ {{number_format($application->job->job_applications_avg_expected_salary)}}</div>
                   </div>

                   <div class="flex gap-2 justify-between">
                       <div>Your expected salary</div>
                       <div>{{$application->expected_salary_formatted}}</div>
                   </div>
               </div>

                <div>
                    <form method="POST" action="{{route('my-job-applications.destroy',$application->id)}}">
                        @method('DELETE')
                        @csrf
                        <x-button type="submit">Cancel</x-button>
                    </form>
                </div>

            </div>

        </x-job-card>

    @empty
      <x-card class="text-center">
          <p>No job applications yet</p>
          <p>Go and find jobs <a class="hover:text-blue-700" href="{{route('jobs.index')}}">here</a></p>
      </x-card>

    @endforelse


</x-layout>
