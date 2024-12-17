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

<div class="row d-flex">
    @foreach ($product_list as $productitem)
        <div class="col-md-3">
            <x-product-card :productitem="$productitem" />
        </div>
    @endforeach
</div>
