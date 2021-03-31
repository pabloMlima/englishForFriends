<form method="POST"  action="{{ $action ?? '' }}" id="{{$idForm ?? ' '}}" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')
        {{ $slot }}

</form>
