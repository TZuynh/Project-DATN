@push('headerFiles')
    @vite(['resources/scss/light/assets/components/timeline.scss'])
    @vite(['resources/scss/dark/assets/components/timeline.scss'])
@endpush

<div class="timeline-simple">
    <p class="timeline-title">{{ $timelineTitle }}</p>
    <div class="timeline-list">
        @foreach($timelines as $timeline)
            <div class="timeline-post-content post-gallery">
                <div class="user-profile">
                    <img src="{{ $timelineImg }}" alt="avatar">
                </div>
                <div class="">
                    <h4>{{ $timeline->brand_name }}</h4>
                    <p class="meta-time-date">Hợp tác vào {{ $timeline->booked_at }}, trên nền tảng {{ $timeline->platform?->name }}</p>
                    <div class="">

                        <h6 class="">Giá Booking: {{ $timeline->booking_price }}</h6>
                        <h6 class="">Giá Net: {{ $timeline->net_price }}</h6>
                        <p class="post-text">
                            {{ $timeline->description }}
                        </p>
                        @if(isset($timelineImgs))
                            <div class="post-gallery-img">
                                @foreach($timelineImgs as $timelineImg)
                                    <img src="{{ $timelineImg }}" alt="timeline">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
