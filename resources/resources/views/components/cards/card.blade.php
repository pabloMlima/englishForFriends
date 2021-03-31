<div class="card {{$classCard ?? '' }}">
    @if(isset($classHeader))
        <div class="card-header {{$classHeader}} ">
        @if(isset($label))
            <div class="t-center f-header-t w-color {{$classLabel ?? ''}}"> {{$label}} </div>
        @endif
        </div>
    @endif
    <div class="card-body {{$classBody ?? ''}}">
        {{$slot}}
    </div>
</div>
