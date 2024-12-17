<div class="footer-item">
    @if (count($list_sub_footer) == 0)
        <h2>
            <a href="{{ url($footer->link) }}"">
                {{ $footer->name }}
            </a>
        </h2>
    @else
        <h2>
            <a href="{{ url($footer->link) }}"">
                {{ $footer->name }}
            </a>
        </h2>
        <ul>
            @foreach ($list_sub_footer as $row_footer_sub)
                <li><a href="{{ url($row_footer_sub->link) }}">{{ $row_footer_sub->name }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
