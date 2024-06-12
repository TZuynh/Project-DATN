<div class="form-group mb-4">
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="@error($name) is-invalid @enderror">
        @foreach ($dataSource as $item)
            <div class="form-check form-check-primary">
                <input class="form-check-input"
                       type="checkbox"
                       value="{{ $item->name }}"
                       name="{{ $name }}[]"
                       id="{{ $id . $loop->index }}"
                    @checked(is_array(old($name, $value)) && in_array($item->name, old($name, $value)))>
                <label class="form-check-label text-capitalize" for="{{ $id . $loop->index }}">
                    @if($valueAttribute)
                        {{ $item->$valueAttribute }}
                    @else
                        {{ $slot }}
                    @endif
                </label>
            </div>
        @endforeach
    </div>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
