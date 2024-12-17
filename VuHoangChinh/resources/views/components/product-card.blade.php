{{-- <div class="col-md-3 product" style="--color: #315bff">
    <a href="#">
        <div class="img">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="" />
        </div>
    </a>
    <div class="content">
        <div class="rating">
            <i class="fi fi-ss-star star star-filled"></i>
            <i class="fi fi-ss-star star star-filled"></i>
            <i class="fi fi-ss-star star star-filled"></i>
            <i class="fi fi-ss-star star star-filled"></i>
            <i class="fi fi-ss-star star"></i>
        </div>
        <p class="title">{{ $product->name }}</p>

        @if ($product->pricesale > 0)
            <p class="price">${{ $product->pricesale }} <del class="text-danger ms-3">${{ $product->price }}</del></p>
        @else
            <p class="price">${{ $product->price }}</p>
        @endif
        <p>
            {{ int($product->saleprice) + int($product->price) }}
        </p>
    </div>
</div> --}}
<style>
    /* FEATURED */
    section {
        margin: 130px 0;
    }

    section .head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 80px;
    }

    section .head a {
        transition: letter-spacing 0.3s;
    }

    section .head a:hover {
        letter-spacing: 2px;
    }

    section .head a span {
        color: inherit;
    }


    p {
        color: black;
    }

    .featured-products .product {
        display: flex;
        flex-direction: column;
        background-color: #f4f4f4;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    /* .featured-products .product .img {
        min-height: 10rem;
        max-height: 10rem;
        max-width: 10rem;
    } */

    .rating {
        text-align: center;
        margin: 10px 0;
    }

    .rating .star {
        font-size: 20px;
        color: var(--color-gray-300);
    }

    .rating .star.star-filled {
        color: var(--color-orange);
    }

    .product .title {
        font-size: 25px;
        font-weight: 500;
        line-height: 32px;
        margin-bottom: 10px;
        text-align: center;
    }

    .product .price {
        font-size: 32px;
        font-weight: 700;
        line-height: 40px;
        text-align: center;
    }

    .btn-addtocard {
        padding: 1em 2em;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    .btn-addtocard:hover {
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-7px);
    }

    .btn-addtocard:active {
        transform: translateY(-1px);
    }


    .badge-overlay {
        position: absolute;
        left: 0px;
        top: -20px;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 100;
    }

    .top-right {
        position: absolute;
        top: 0;
        right: 0;
        -ms-transform: translateX(30%) translateY(0%) rotate(45deg);
        -webkit-transform: translateX(30%) translateY(0%) rotate(45deg);
        transform: translateX(30%) translateY(0%) rotate(45deg);
        -ms-transform-origin: top left;
        -webkit-transform-origin: top left;
        transform-origin: top left;
    }

    .badge.red {
        background: #ed1b24;
    }
</style>

<div class="container featured-products mt-2">
    <div class="product" style="color:#315bff">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
            <div class="img">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}" />
            </div>
        </a>
        @if ($product->pricesale > 0 && $product->pricesale < $product->price)
            <div class="badge-overlay">
                <span class="top-right badge red fs-6">Sale to
                    {{ number_format((1 - $product->pricesale / $product->price) * 100) }}%</span>
            </div>
        @endif
        <div class="content">
            <div class="rating">
                <i class="fi fi-ss-star star star-filled"></i>
                <i class="fi fi-ss-star star star-filled"></i>
                <i class="fi fi-ss-star star star-filled"></i>
                <i class="fi fi-ss-star star star-filled"></i>
                <i class="fi fi-ss-star star"></i>
            </div>
            <p class="title">{{ $product->name }}</p>

            @if ($product->pricesale > 0)
                <p class="price">${{ $product->pricesale }} <del class="text-danger ms-3">${{ $product->price }}</del>
                </p>
            @else
                <p class="price">${{ $product->price }}</p>
            @endif
            <button class="btn-addtocard" onclick="handleAddCart({{ $product->id }})"> Add to cart</button>
        </div>
    </div>
</div>

<script>
    function handleAddCart(productId) {
        let qty = 1;
        $.ajax({
            url: "{{ route('site.cart.addCart') }}",
            type: "GET",
            data: {
                productId: productId,
                qty: qty
            },
            success: function(result, status, xhr) {
                document.getElementById('showqty').innerHTML = result;
                alert("Add to cart success");
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        })
    }
</script>
