@if (count($list_sub_menu) == 0)
    <li class="nav-item">
        @if ($menu->link == '')
            <a class="nav-link" href="{{ route('site.home') }}">{{ $menu->name }}</a>
        @else
            <a class="nav-link" href="{{ url($menu->link) }}">{{ $menu->name }}</a>
        @endif
    </li>
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url($menu->link) }}" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ $menu->name }}
        </a>
        <ul class="dropdown-menu">
            @foreach ($list_sub_menu as $row_menu_sub)
                <li><a class="dropdown-item" href="{{ url($row_menu_sub->link) }}">{{ $row_menu_sub->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif
