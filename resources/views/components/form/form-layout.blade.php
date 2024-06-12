<div
    @class([
       'col-lg-6 col-12' => !($customCol),
       $customCol
    ])
>
    <form {{ $attributes }} method="POST" action="{{ $formUrl }}">
        @csrf
        @method($formMethod)

        {{ $slot }}
    </form>
</div>
