@push('headerFiles')
    <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet"
          href="{{asset('plugins/table/datatable/extensions/col-reorder/col-reorder.datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('plugins/table/datatable/extensions/fixed-columns/fixed-columns.datatables.min.css')}}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
    {{ isset($customStyle) ? $customStyle : '' }}
@endpush

@if(isset($tableFilter))
    @section('currentPageFilter')
        <div class="container-fluid">
            <div class="row">
                {{ $tableFilter }}
            </div>
        </div>
    @endsection
@endif

<table id="{{ $id }}" class="table style-3 dt-table-hover" {{ $attributes }} style="width:100%">
    <thead>
        {{ $tableHeader }}
    </thead>
    @if(isset($tableBody))
        <tbody>
            {{ $tableBody }}
        </tbody>
    @endif
    @if(isset($tableFooter))
        <tfoot>
            {{ $tableFooter }}
        </tfoot>
    @endif
</table>

@push('footerFiles')
    @vite(['resources/assets/js/custom.js'])
    <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <script type="module"
            src="{{asset('plugins/table/datatable/extensions/col-reorder/col-reorder.datatables.min.js')}}"></script>
    <script type="module"
            src="{{asset('plugins/table/datatable/extensions/fixed-columns/fixed-columns.datatables.min.js')}}"></script>
    <script type="module">
        let drawDT = 0;

        const c1 = $('#{{ $id }}').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": {{ json_encode($menuLength) }},
            "pageLength": {{ $pageLength }},
            {{ isset($customScript) ? $customScript : '' }}
        });

        multiCheck(c1);

        $(document).on('keyup', '.search-bar .search-form-control', function () {
            c1.search(this.value).draw();
        })
    </script>
@endpush
