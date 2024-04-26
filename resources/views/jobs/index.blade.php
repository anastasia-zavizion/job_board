<x-layout>
   @foreach($jobs as $job)
       <x-card class="mb-2">{{$job->title}}</x-card>
    @endforeach
</x-layout>
