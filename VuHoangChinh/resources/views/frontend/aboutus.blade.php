@extends('layouts.site')

@section('header')
    <style>
        .img-about {
            max-width: 30rem;
            max-height: 30rem;
        }
    </style>
@endsection

@section('content')
    <div class="about">
        <h1 class="text-center">Contact with us</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 align-self-center">
                <h3>About us</h3>
                <p>
                    F1GENZ BABIE is a place where prestigious brands, genuine and top-quality products for mothers and
                    babies are gathered in Vietnam. Not only that, F1GENZ BABIE provides parents with a great and reliable
                    shopping experience and is committed to providing the best customer care services, sales consulting,
                    product use consulting and delivery services.
                </p>
            </div>
            <div class="col-md-4">
                <img class="img-about" src="{{ asset('images/tatum1.png') }}" alt="tatum1.png">
            </div>
        </div>
    </div>
@endsection

@section('title', 'About us')



@section('footer')
@endsection
