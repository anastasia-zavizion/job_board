<div class="relative">
    @if($type !== 'textarea')
    <input type="{{$type}}" x-ref="input-{{$name}}" @class(['w-full rounded-md py-1.5 px-2.5 text-sm ring-1 focus:ring-2', 'pr-8'=>$formRef, 'ring-slate-300'=>!$errors->has($name), 'ring-red-300'=>$errors->has($name)]) type="text" placeholder="{{$placeholder}}" name="{{$name}}" value="{{old($name,$value)}}" id="{{$name}}">
    @if($formRef)
    <button type="submit" class="absolute top-0 right-0 flex h-full items-center pr-2 text-slate-500">
        <svg @click="$refs['input-{{$name}}'].value=''"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
    @endif

    @else
        <textarea @class(['w-full rounded-md py-1.5 px-2.5 text-sm ring-1 focus:ring-2', 'pr-8'=>$formRef, 'ring-slate-300'=>!$errors->has($name), 'ring-red-300'=>$errors->has($name)]) type="text" placeholder="{{$placeholder}}" name="{{$name}}" rows="3" name="{{$name}}" id="{{$name}}" >{{old($name,$value)}}</textarea>
    @endif

    @error($name)
    <div class="text-red-600 mt-2">{{ $message }}</div>
    @enderror
</div>
