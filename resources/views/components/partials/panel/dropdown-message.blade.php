@props(['image', 'message', 'sender', 'time', 'status' => ''])

<a class="dropdown-item d-flex align-items-center" href="{{ $attributes->get('href', '#') }}">
    <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="{{ $image }}" alt="...">
        <div class="status-indicator {{ $status }}"></div>
    </div>
    <div class="{{ isset($attributes['font-weight-bold']) ? 'font-weight-bold' : '' }}">
        <div class="text-truncate">{{ $message }}</div>
        <div class="small text-gray-500">{{ $sender }} · {{ $time }}</div>
    </div>
</a>
