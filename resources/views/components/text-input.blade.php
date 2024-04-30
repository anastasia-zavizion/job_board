<div class="relative">
    <input type="{{$type}}" x-ref="input-{{$name}}"  class="w-full rounded-md py-1.5 px-2.5 text-sm ring-1 ring-slate-100 focus:ring-2 pr-8" type="text" placeholder="{{$placeholder}}" name="{{$name}}" value="{{$value}}" id="{{$name}}">
    <button type="submit" class="absolute top-0 right-0 flex h-full items-center pr-2 text-slate-500">
        <svg @click="$refs['input-{{$name}}'].value=''"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
