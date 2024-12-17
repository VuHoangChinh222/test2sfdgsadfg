    <!-- NEW ARRIVAL -->
    <div class="new-arrival">
        <div class="container">
            <section>
                <div class="head">
                    <h2>New Arrival</h2>
                    <a href="#" style="text-decoration: none;color:#cc3060">
                        <span>View all</span>
                        <i class="fi fi-rr-arrow-right"></i>
                    </a>
                </div>
                <p>
                    Enjoy the new products from our store. Select what you like, enjoy &
                    return.
                </p>
                <div class="row">
                    @foreach ($product as $productitem)
                        <div class="col-md-3">
                            <x-product-card :productitem="$productitem" />
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
