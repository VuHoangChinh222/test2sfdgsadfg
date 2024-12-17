@extends('layouts.site')

@section('header')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 p-0">
                <h1 class="text-center">
                    {{ $pageData->title }}
                </h1>
                <div class="container row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row d-flex">
                            <div class="col-8">
                                Description:
                                <br />
                                {{ $pageData->description }}
                                <br />
                                <br />
                                Detail:
                                <br />
                                {{ $pageData->detail }}
                            </div>
                            <div class="col-4 align-items-center">
                                <img src="{{ asset('images/posts/' . $pageData->image) }}" alt="{{ $pageData->image }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'All product')


@section('footer')
@endsection
