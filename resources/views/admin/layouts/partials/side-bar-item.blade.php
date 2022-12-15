@if (is_null($href))
    <li class="nav-item nav-category">
        <span class="nav-link">{{ $label }}</span>
    </li>
@else
    <li class="nav-item menu-items @if ($active) active @endif">
        <a class="nav-link" href="{{ $href }}">
            <span class="menu-icon">
                <i class="{{ $icon }}"></i>
            </span>
            <span class="menu-title">{{ $label }}</span>
        </a>
    </li>    
@endif
