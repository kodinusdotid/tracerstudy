@props(['link', 'icon', 'text', 'active' => false])

<li class="nav-item {{ $active ? 'active' : '' }}">
    <a class="nav-link" href="{{ $link }}">
        <i class="{{ $icon }}"></i>
        <span>{{ $text }}</span>
    </a>
</li>
