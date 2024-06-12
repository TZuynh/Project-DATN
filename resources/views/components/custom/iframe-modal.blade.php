<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" {{ $attributes }}>
    <div {{ $modalContent->attributes->merge(['class' => 'modal-dialog']) }} role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(isset($modalHeader))
                    {{ $modalHeader }}
                @else
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                @endif
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                @if(isset($modalFooter))
                    {{ $modalFooter }}
                @else
                    <button class="btn btn btn-light-dark" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        Close
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
