@push('headerFiles')
    <link rel="stylesheet" href="{{asset('plugins/noUiSlider/nouislider.min.css')}}">
    @vite(['resources/scss/light/plugins/noUiSlider/custom-nouiSlider.scss'])
    @vite(['resources/scss/dark/plugins/noUiSlider/custom-nouiSlider.scss'])
@endpush

<div class="form-group mb-4 {{ $wrapperClasses }}">
    @if($label)
        <label for="{{ $id }}" class="mb-5">{{ $label }}</label>
    @endif

    <div id="{{ $id }}"></div>
</div>

@push('footerFiles')
    <script src="{{asset('plugins/noUiSlider/nouislider.min.js')}}"></script>
    <script src="{{asset('plugins/noUiSlider/wNumb.min.js')}}"></script>
    <script>
        {
            let html5Slider = document.getElementById('{{ $id }}');
            let url = new URL(window.location);
            let defaultMinValue = {{ $defaultMinValue }};
            let defaultMaxValue = {{ $defaultMaxValue ?: '1000000' }};
            let minValue = defaultMinValue;
            let maxValue = defaultMaxValue;
            let moneyFormat = wNumb({
                decimals: 0,
                thousand: '.'
            });

            if (url.searchParams.has('{{ $minName }}')) {
                minValue = url.searchParams.get('{{ $minName }}');
                maxValue = url.searchParams.get('{{ $maxName }}');
            }

            noUiSlider.create(html5Slider, {
                start: [minValue, maxValue],
                connect: true,
                tooltips: true,
                range: {
                    'min': defaultMinValue,
                    'max': defaultMaxValue
                },
                step: {{ $step }},
                format: moneyFormat
            });

            $(document).on('click', '#remove-filter-btn', function() {
                html5Slider.noUiSlider.set([defaultMinValue, defaultMaxValue])
            })

            html5Slider.noUiSlider.on('change', function (values) {
                let minValue = values[0];
                let maxValue = values[1];
                let currentUrl = new URL(window.location);
                currentUrl.searchParams.set(`{{ $minName }}`, moneyFormat.from(minValue))
                currentUrl.searchParams.set(`{{ $maxName }}`, moneyFormat.from(maxValue))

                window.history.pushState({}, '', currentUrl);
                if ($('#{{ $datatableId }}').length) {
                    $('#{{ $datatableId }}').DataTable().ajax.reload()
                }
            });

            {{ isset($customScript) ? $customScript : '' }}
        }
    </script>
@endpush
