@props([
    'limit' => 'null'
])

@push('headerFiles')
    <style>
        .ts-wrapper.form-control-lg .ts-control {
            font-size: 15px;
        }

        .ts-dropdown {
            font-size: 15px;
        }
    </style>
@endpush

<div class="form-group mb-4 {{ $wrapperClasses }}">
    @if($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    <select id="{{ $id }}"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            {{ $multiple ? 'multiple' : 0 }}
            {{ $attributes }}
            class="form-control form-control-lg @error($name) is-invalid @enderror">
        @foreach($dataValues as $item)
            <option
                value="{{ $item->$selectValueAttribute }}"
                @if(is_array(old($name, $values)))
                    @selected(in_array($item->$selectValueAttribute, old($name, $values)))
                @else
                    @selected($item->$selectValueAttribute == old($name, $values))
                @endif
            >
                {{ $item->$selectValueLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@push('footerFiles')
    <script>
        // Multi Select
        $(document).ready(function () {
            let url = new URL(window.location);

            let select = new TomSelect("#{{ $id }}", {
                maxItems: {{ $multiple ? $limit : 1 }},
                closeAfterSelect: false,
                placeholder: '{{ $placeholder }}',
                persist: false,
                onChange: function (value) {
                    @if($isFilter)
                        let currentUrl = new URL(window.location);
                        if (value) {
                            if ($.isArray(value)) {
                                if (value.length) {
                                    currentUrl.searchParams.set(`{{ $name }}`, value)
                                } else {
                                    currentUrl.searchParams.delete(`{{ $name }}`)
                                }
                            } else {
                                currentUrl.searchParams.set(`{{ $name }}`, value)
                            }
                        } else {
                            currentUrl.searchParams.delete(`{{ $name }}`)
                        }
                        window.history.pushState({}, '', currentUrl);
                        if ($('#{{ $datatableId }}').length) {
                            $('#{{ $datatableId }}').DataTable().ajax.reload()
                        }
                    @endif
                }
            });

            $(document).on('click', '#remove-filter-btn', function() {
                select.clear();
            })

            if (url.searchParams.has('{{ $name }}')) {
                let selectedId = url.searchParams.get('{{ $name }}');
                if (selectedId.includes(',')) {
                    selectedId = selectedId.split(',');
                }
                select.setValue(selectedId)
            }
        })
    </script>
@endpush
