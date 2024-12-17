@extends('layouts.site')

@section('header')
    <style>
        .img-singlePage {
            max-width: 10rem;
            max-height: 10rem;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $singlePage->title }}</h1>
        <div class="row mt-4">
            <div class="col-md-8">
                <ul>Description:
                    <li>
                        {{ $singlePage->description }}
                    </li>
                </ul>
                <ul>Detail:
                    <li>
                        {{ $singlePage->detail }}
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <img id="img-singlePage" src="{{ asset('images/posts/' . $singlePage->image) }}"
                    alt="{{ $singlePage->image }}">
            </div>
        </div>
    </div>
@endsection

@section('title', $singlePage->title)

@section('footer')
@endsection
