<button type="{{$type ?? 'button'}}" class="btn btn-{{$class ?? ''}}"
    @if(isset($function))  onclick="{{$function}}" @endif>{{$slot}}</button>
