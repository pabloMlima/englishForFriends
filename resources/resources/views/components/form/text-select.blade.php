<label for="{{$for ?? ''}}">{{$label ?? ''}}</label>
<select class="form-control {{$class ?? ''}}" id="{{$id ?? ''}}" name="{{$name ?? ''}}" @if(isset($required)) required @endif>
   {{$slot ?? ''}}
</select>
