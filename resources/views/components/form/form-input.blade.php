<div class="form-group mb-4">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
           id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ old($oldName ?: $name, $value) }}" {{ $attributes }}>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
