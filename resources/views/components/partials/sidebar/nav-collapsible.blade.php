<li class="nav-item {{ $active ?? '' }}">
    <a class="nav-link {{ isset($show) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#{{ $id }}"
        aria-expanded="{{ isset($show) ? 'true' : 'false' }}" aria-controls="{{ $id }}">
        <i class="{{ $icon }}"></i>
        <span>{{ $text }}</span>
    </a>
    <div id="{{ $id }}" class="collapse {{ isset($show) ? 'show' : '' }}" aria-labelledby="heading{{ ucfirst($id) }}"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @foreach($items as $item)
                @if(isset($item['header']))
                    <h6 class="collapse-header">{{ $item['header'] }}</h6>
                @elseif(isset($item['divider']))
                    <div class="collapse-divider"></div>
                @else
                    <a class="collapse-item {{ isset($item['active']) && $item['active'] ? 'active' : '' }}" href="{{ $item['link'] }}">{{ $item['text'] }}</a>
                @endif
            @endforeach
        </div>
    </div>
</li>
