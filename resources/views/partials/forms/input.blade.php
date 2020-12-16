<div class="form-group @isset($class){{ $class }}@endisset" @isset($attribute){{ $attribute }}@endisset>
    <label for="{{ $name }}">
        @lang($label)
    </label>
    <input 
        id="{{ $name }}" 
        type="{{ $type }}" 
        class="input-block @error($name) is-invalid @enderror" 
        name="{{ $name }}" 
        value="{{ old($name, isset($value)? $value : null) }}" 
        @isset($required) required @endisset 
        @isset($autofocus) autofocus @endisset
    >
    @error($name)
        <span class="red" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
