<div class="row layout-top-spacing">
    <div id="{{ $boxId }}"
        @class([
           'col-xl-8 col-12' => !($customCol),
           $customCol,
           'layout-spacing',
        ])
    >
        <div class="statbox widget box box-shadow">
            @if(isset($boxTitle))
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{ $boxTitle }}</h4>
                        </div>
                    </div>
                </div>
            @endif
            <div class="widget-content widget-content-area">
                @if(isset($action))
                    {{ $action }}
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
</div>
