<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumbItems as $title => $link)
                @if($loop->last)
                    <li class="breadcrumb-item text-capitalize active" aria-current="{{ $title }}">
                        {{ $title }}
                    </li>
                @else
                    <li class="breadcrumb-item">
                        <a @class(['text-capitalize']) href="{{ $link ? $link : 'javascript:void(0)' }}">
                            {{ $title }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->
