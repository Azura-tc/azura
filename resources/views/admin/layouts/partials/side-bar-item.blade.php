@if (is_array($items))
    <li class="nav-item menu-items @if ($active) active @endif">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ '#'.str($label)->slug }}" aria-expanded="false" aria-controls="{{ str($label)->slug }}">
            <span class="menu-icon">
                <i class="{{ $icon }}"></i>
            </span>
            <span class="menu-title">{{ $label }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="{{ str($label)->slug }}">
            <ul class="nav flex-column sub-menu">
                @foreach ($items as $item)
                    <li class="nav-item"> <a class="nav-link @if ($item['active']) active @endif" href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </li>
@elseif (!is_null($href))
    <li class="nav-item menu-items @if ($active) active @endif">
        <a class="nav-link" href="{{ $href }}">
            <span class="menu-icon">
                <i class="{{ $icon }}"></i>
            </span>
            <span class="menu-title">{{ $label }}</span>
        </a>
    </li>
@else
    <li class="nav-item nav-category">
        <span class="nav-link">{{ $label }}</span>
    </li>
@endif
