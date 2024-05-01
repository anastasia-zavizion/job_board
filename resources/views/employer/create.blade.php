<x-layout>
<x-card>
    <x-breadcrumbs class="mb-4"
                   :links="['Register an employer' =>'#']"/>

    <x-card>
        <h2 class="font-medium mb-4">Register an employer</h2>
        <form  method="POST" action="{{route('employer.store')}}">
            @csrf
            <div class="mb-4">
                <x-label :required="true"  for="company_name" text="Company name"/>
                <x-text-input name="company_name"/>
            </div>
            </div>
            <div>
                <x-button type="submit">Create</x-button>
            </div>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </form>
    </x-card>
</x-card>
</x-layout>
