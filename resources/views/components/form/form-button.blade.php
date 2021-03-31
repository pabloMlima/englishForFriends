<form method="POST"  action="{{ $action ?? '' }}" id="{{$idForm ?? ' '}}" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')
        {{ $slot }}
        <br>
        <div class="float-right">
            <button type="{{$type ?? 'button'}}" id="{{$btnId ?? ''}}" class="btn btn-{{$class ?? 'success'}}"
                @if(isset($disabled)) disabled @endif @if (isset($function)) onclick="{{$function}}" @endif>{{$label}} </button>
        </div>
</form>
