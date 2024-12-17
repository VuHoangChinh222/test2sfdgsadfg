<style>
    .featured-products .product .img {
        position: relative;
        width: 90%;
        height: 150px;
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="featured">
    <div class="container">
        <section>
            <div class="head">
                <h2>Flash sale</h2>
                <a href="#" style="text-decoration: none;color:#cc3060">
                    <span>View all</span>
                    <i class="fi fi-rr-arrow-right"></i>
                </a>
            </div>
            <div class="row d-flex">
                @foreach ($product_flash_sale as $product)
                    <div class="col-md-3">
                        <x-product-card :productitem="$product" />
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
