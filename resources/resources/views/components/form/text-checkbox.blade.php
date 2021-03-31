<label class="form-check-label {{$classLabel ?? ''}}">
      <input class="form-check-input {{$classInput ?? ''}}" type="checkbox" name="{{$name ?? ''}}" value="{{$value ?? ''}}">
      {{$slot}}
</label>
