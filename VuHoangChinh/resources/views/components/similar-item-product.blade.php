<style>
    #img-product {
        max-width: 10rem;
        max-height: 10rem;
    }
</style>

<div class="d-flex mb-3">
    <a href="{{ route('site.product.detail', ['slug' => $item->slug]) }}" class="me-3">
        <img id="img-product" class="img-md img-thumbnail" src="{{ asset('images/products/' . $item->image) }}" />
    </a>
    <div class="info">
        <a href="{{ route('site.product.detail', ['slug' => $item->slug]) }}" class="nav-link mb-1">
            {{ $item->name }}
        </a>
        <strong class="text-dark"> ${{ $item->pricesale ? $item->pricesale : $item->price }}</strong>
    </div>
</div>
