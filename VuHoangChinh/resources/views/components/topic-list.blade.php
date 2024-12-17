@foreach ($topic_list as $item)
    <a href="{{ route('site.post.index', ['slug' => $item->slug]) }}" style="color: black">
        <label>
            <input type="checkbox" class="topic" value="{{ $item->id }}">
        </label>
        {{ $item->name }}
    </a>
    </br>
@endforeach
