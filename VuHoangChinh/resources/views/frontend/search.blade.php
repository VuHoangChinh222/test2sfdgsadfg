@extends('layouts.site')

@section('header')
    <style>
        #input-search,
        #btn-search {
            height: 3rem;
        }

        #input-search {
            border: 1px solid rgb(193, 186, 186);
            border-radius: 1.5rem;
            text-align: center;
        }

        #btn-search {
            width: 5rem;
            color: white;
            border: 1px solid #af1713;
            background-color: #af1713;
        }

        #btn-search:hover {
            background-color: #ffffff;
            color: #af1713;
        }

        #type-search {
            height: 3rem;
            border-radius: 0.5rem;
            text-align: center;
            background-color: #af1713;
            color: white;
        }

        #type-search:hover {
            background-color: #ffffff;
            color: #af1713;
        }

        .featured-products .product .img {
            min-height: 10rem;
            max-height: 10rem;
            max-width: 10rem;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 p-0">
                <h1 class="text-center">SEARCH</h1>
                <div class="row mt-3 d-flex">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{ route('site.search.search') }}" method="get">
                            @csrf
                            <select name="type_search" id="type-search">
                                <option class="option" value="product">Product</option>
                                <option class="option" value="post">Post</option>
                            </select>
                            <input id="input-search" name="query" type="text" style="width: 80%">
                            <button id="btn-search" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                @if (isset($list_res[0]))
                    <h3 class="text-center">Result</h3>
                    <div class="row mt-3">
                        <div class="row justify-content-center">
                            @if ($search_type == 'product')
                                @foreach ($list_res as $productitem)
                                    <div class="col-md-3">
                                        <x-product-card :productitem="$productitem" />
                                    </div>
                                @endforeach
                            @else
                                @foreach ($list_res as $item)
                                    <div class="col-md-3">
                                        <x-post-cart :$item />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('title', 'Search')
