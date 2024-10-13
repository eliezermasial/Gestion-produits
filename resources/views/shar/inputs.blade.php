@php
   $name = $name ??  '';
   $type = $type ??  '';
   $class = $class ??  null;
   $value = $value ??  '';
   $label = $label ??  ucfirst($name);
@endphp

<div class="form-group row">
    <label for="{{$name}}" class="col-sm-3 col-form-label"> {{$label}} </label>
    @if ($type === 'textarea')

        <div class="col-sm-9">
            <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" name="{{$name}}" id="{{$name}}" placeholder="{{$label}}" rows="3" cols="20">
                {{old($name,$value)}}
            </textarea>
        </div>
        

    @elseif ($type === 'email')

        <div class="col-sm-9">
            <input type="{{$type}}" class="form-control @error($name)is-invalid @enderror" id="{{$name}}" value="{{ old($name,$value)}}" placeholder="{{$label}}">
        </div>
    @elseif ($type === 'number')
        <div class="col-sm-9">
            <input type="{{$type}}" class="form-control @error($name)is-invalid @enderror" id="{{$name}}" value="{{ old($name,$value)}}" placeholder="{{$label}}">
        </div>

    @else
        <div class="col-sm-9">
            <input type="{{$type}}" class="form-control @error($name) is-invalid @enderror" id="{{$name}}" value="{{ old($name,$value)}}" placeholder="{{$label}}">
        </div>
    @endif
    
    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror

</div>