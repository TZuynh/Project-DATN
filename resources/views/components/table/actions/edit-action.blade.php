@can($permission)
    <li>
        <a href="{{ $url }}" data-bs-toggle="tooltip" data-bs-placement="top"
           title="{{ __('Sửa') }}" data-original-title="{{ __('Sửa') }}"
            {{ $attributes->merge(['class' => 'bs-tooltip']) }}
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-edit-2 p-1 br-6 mb-1">
                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                </path>
            </svg>
        </a>
    </li>
@endcan
