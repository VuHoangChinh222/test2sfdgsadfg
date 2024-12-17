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
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 p-0">
                <h1>
                    @if ($slug == '*')
                        ALL POST
                    @else
                        TOPIC {{ $nameTopic->name }}
                    @endif
                </h1>
                <div class="container row">
                    <div id="filter" class="col-md-3">
                        <div class="cap text-center text-white text-center text-white fs-5">Topic</div>
                        <div class="ct">
                            <x-topic-list />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($list_post as $item)
                                <div class="col-md-4 mb-2">
                                    <x-post-cart :$item />
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 d-flex justify-content-center">
                                {{ $list_post->links() }}
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
