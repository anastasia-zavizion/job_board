<x-layout>
<x-card>
    <x-breadcrumbs class="mb-4"
                   :links="['My jobs' => route('my-jobs.index'), 'Create Job' =>'#']" />

    <x-card>
        <h2 class="font-medium mb-4">Create Job</h2>
        <form method="POST" action="{{route('my-jobs.store')}}">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <x-label :required="true"  for="title" text="Job title"/>
                    <x-text-input name="title"/>
                </div>
                <div class="mb-4">
                    <x-label :required="true"  for="location" text="Location"/>
                    <x-text-input name="location"/>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="salary" text="Salary"/>
                    <x-text-input class="w-full" name="salary"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="description" text="Description"/>
                    <x-text-input type="textarea" name="description"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="experience" text="Experience"/>
                    <x-radio-group :show-all="false" :value="old('experience')"  name="experience" :options="App\Models\Job::$experience"/>
                </div>

                <div class="mb-4 col-span-2">
                    <x-label :required="true"  for="category" text="Category"/>
                    <x-radio-group :show-all="false" :value="old('category')" name="category" :options="App\Models\Job::$category"/>

                </div>


            </div>

            <div>
                <x-button class="w-full" type="submit">Create Job</x-button>
            </div>
        </form>
    </x-card>
</x-card>
</x-layout>
