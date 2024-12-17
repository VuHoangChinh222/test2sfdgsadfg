@foreach ($category_list as $cat_row)
    <div class="row">
        <div class="featured">
            <div class="container">
                <section>
                    <div class="head">
                        <h2>{{ $cat_row->name }}</h2>
                        <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}"
                            style="text-decoration: none;color:#cc3060">
                            <span>View all</span>
                            <i class="fi fi-rr-arrow-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <x-product-category :catrow="$cat_row" />
                    </div>
                </section>
            </div>
        </div>
    </div>
@endforeach
