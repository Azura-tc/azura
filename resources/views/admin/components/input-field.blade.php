<div class="form-group">
    @php
    $errorClass = ''
    @endphp
    @error($old) {{-- $errorClass = 'is_invalid' --}} @enderror
    @if (!is_null($label))
    <label for="{{$id ?? $name}}">{{ $label }}</label>
    @endif
    @if($textarea)
        <textarea @if ($disabled) disabled @endif id="{{$id ?? $name}}" name="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}" rows="4" {{ $attributes->class(['form-control', 'is_invalid' => $errors->has($name), 'form-control-lg' => is_null($label)]) }}>{{ old($old ?? $name, $value ?? '') }}</textarea>
    @else
        <input id="{{$id ?? $name}}" name="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}" value="{{ old($old ?? $name, $value ?? '') }}"
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($old), 'form-control-lg' => is_null($label)]) }}
        @if ($type === 'file')
            data-default-file="{{ old($old, $value ?? '') }}"
        @endif @if ($disabled) disabled @endif>
    @endif
    @if ($textarea || $type === 'file')
        <span class="d-none is-invalid"></span>
    @endif
    @error($old)
        <small class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </small>
    @enderror
    {{$slot}}
</div>