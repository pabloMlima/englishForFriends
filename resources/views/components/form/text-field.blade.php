<div class="form-row">
    @if($label ?? null)
    <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
        {{ $label }}
    </label>
    @endif
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
    <input
        autocomplete="off"
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="{{$class ?? 'input form-control'}}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ old($name, $value ?? '') }}"
        @if(isset($onchange)) onchange="{{$onchange}}" @endif
        {{ ($required ?? false) ? 'required' : '' }}
    >
</div>
