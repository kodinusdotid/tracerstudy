@props(['url' => '#', 'label', 'icon' => null, 'class' => null])

<a class="dropdown-item{{ $class ? " {$class}" : "" }}" href="{{ $url }}">
    @if ($icon)
    <i class="fas{{ $icon ? " {$icon}" : "" }} fa-sm fa-fw mr-2 text-gray-400"></i>
    @endif
    {{ $label }}
</a>
