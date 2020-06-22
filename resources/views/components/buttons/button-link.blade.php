<a type="{{$type ?? 'button' }}" class="btn {{$class ?? '' }}" href="{{$href ?? '#'}}"
    @if(isset($modal)) data-toggle="modal" data-target="#{{$modal}}"@endif @if(isset($function))
        onclick="{{$function}}" @endif> {{$slot}} </a>
