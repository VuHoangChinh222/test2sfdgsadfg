@extends('layouts.site')

@section('header')
    <style>
        .content {
            margin-top: 50px;
        }

        .content h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Fillter */
        #filter .cap {
            background-color: #b9302b;
            border-radius: 10px;
        }


        .featured-products .product .img {
            position: relative;
            width: 90%;
            height: 150px;
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 p-0">
                <h1>{{ $row->name }}</h1>
                <div class="container row">
                    <div id="filter" class="col-md-3">
                        <form action="{{ route('site.product.categoryFilter', ['slug' => $row->slug]) }}" method="GET"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="cap text-center text-white text-center text-white fs-5">Brand</div>
                            <div class="ct">
                                <x-list-brand />
                            </div>
                            <div class="cap text-center text-white text-center text-white fs-5">Category</div>
                            <div class="ct">
                                <x-list-category />
                            </div>
                            <div class="cap text-center text-white mt-2 fs-5">Sort</div>
                            <div class="ct">
                                <label><input name="sort" type="radio" class="sort" value="price-ASC">Increases
                                    price</label>
                                <br>
                                <label><input name="sort" type="radio" class="sort" value="price-DESC">Decreasing
                                    price</label>
                                <br>
                                <label><input name="sort" type="radio" class="sort" value="name-ASC">Name:
                                    A-Z</label>
                                <br>
                                <label><input name="sort" type="radio" class="sort" value="name-DESC">Name:
                                    Z-A</label>
                                <br>
                            </div>
                            <button type="submit" class="btn-private sm" data-after="Filter">Filter</button>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($list_product as $productitem)
                                <div class="col-md-4">
                                    <x-product-card :productitem="$productitem" />
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 d-flex justify-content-center">
                                @if ($haveLink == true)
                                    {{ $list_product->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'All product')


@section('footer')
@endsection
