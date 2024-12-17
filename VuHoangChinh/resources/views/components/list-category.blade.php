@foreach ($category as $item)
    <label><input name="{{ $item->slug }}" type="checkbox" class="thuonghieu" value="{{ $item->id }}">
        <a href="{{ route('site.product.category', ['slug' => $item->slug]) }}"
            style="text-decoration: none;color:black">{{ $item->name }}</a>
    </label>
    <br>
@endforeach
