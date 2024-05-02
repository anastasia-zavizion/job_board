<x-layout>
<x-card>
    <x-breadcrumbs class="mb-4"
                   :links="['My jobs' => route('my-jobs.index'), 'Edit Job' =>'#']" />

    <x-card>
        <h2 class="font-medium mb-4">Edit Job</h2>
        <form method="POST" action="{{route('my-jobs.update', $job->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
           <div class="mb-4">
                    <x-label :required="true"  for="title" text="Job title"/>
                    <x-text-input :value="$job->title" name="title"/>
           </div>
              <div class="mb-4">
                    <x-label :required="true"  for="location" text="Location"/>
                    <x-text-input :value="$job->location" name="location"/>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="salary" text="Salary"/>
                    <x-text-input :value="$job->salary"  class="w-full" name="salary"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="description" text="Description"/>
                    <x-text-input  :value="$job->description" type="textarea" name="description"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="experience" text="Experience"/>
                    <x-radio-group :show-all="false" :value="$job->experience"  name="experience" :options="App\Models\Job::$experience"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="category" text="Category"/>
                    <x-radio-group :show-all="false" :value="$job->category" name="category" :options="App\Models\Job::$category"/>
                </div>
            </div>

            <div>
                <x-button class="w-full" type="submit">Update Job</x-button>
            </div>
        </form>
    </x-card>
</x-card>
</x-layout>
