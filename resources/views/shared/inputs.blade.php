@php
   $name = $name ??  '';
   $type = $type ??  '';
   $class = $class ??  null;
   $value = $value ??  '';
   $label = $label ??  ucfirst($name);
@endphp

<div class="form-group">
    
    
    <label for="{{$name}}"> {{$label}} </label>

    @if ($type === 'textarea')

        <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" name="{{$name}}" id="{{$name}}">
            {{old($name,$value)}}
        </textarea>

    @elseif ($type === 'date')

        <input class="form-control @error($name) is-invalid @enderror" 
            name="{{$name}}" id="{{$name}}"
            value="{{ old($name, isset($value) ? $value : '') }}" 
            placeholder="YYYY-MM-DD">

    @elseif ($type === 'email')

        <input type="email" class="form-control form-control-lg @error($name) is-invalid @enderror"
        name="{{$name}}" id="{{$name}}" placeholder="{{$name}}">

    @elseif ($type === 'password')  

        <input type="password" class="form-control form-control-lg @error($name) is-invalid @enderror"
            name="{{$name}}" id="{{$name}}" placeholder="{{$name}}">

    @elseif ($type == 'search')

        <input type="search" class="form-control w-50 @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}" placeholder="{{$name}}">

    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{$type}}" 
        name="{{$name}}" id="{{$name}}" value="{{ old($name,$value)}}" placeholder="{{$name}}">
        
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>