<div class="simple-pill">
    <ul class="nav nav-pills bg-light-dark p-3 br-8 mb-3" id="pills-tab" role="tablist">
        @foreach($tabs as $tabName => $slotName)
            @php
                $tabId = Str::snake($tabName);
            @endphp
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($loop->first) active @endif"
                        id="pills-{{ $tabId }}-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $tabId }}"
                        type="button"
                        role="tab"
                        aria-controls="pills-{{ $tabId }}"
                        aria-selected="@if($loop->first) true @else false @endif">
                    {{ __($tabName) }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="pills-tabContent">
        @foreach($tabs as $tabName => $slotName)
            @php
                $tabId = Str::snake($tabName);
            @endphp
            <div class="tab-pane fade @if($loop->first) show active @endif"
                 id="pills-{{ $tabId }}"
                 role="tabpanel"
                 tabindex="{{ $loop->index }}">
                {{ ${$slotName} }}
            </div>
        @endforeach
    </div>
</div>
