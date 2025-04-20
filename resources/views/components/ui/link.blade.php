@props(['link' => '#', 'truncated' => false, 'class' => ''])

<a href="{{ $link }}" class="{{ $class }} {{ $truncated ? 'text-truncate' : '' }}">
    {{ $truncated ? Str::limit($link, 30) : $link }}
</a>

