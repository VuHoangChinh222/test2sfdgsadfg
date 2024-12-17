@extends('layouts.site')

@section('header')
@endsection

@section('content')
    <div>
        <!-- content -->
        <section class="py-5">
            <div class="container">
                <div class="row gx-5">
                    <aside class="col-lg-6">
                        <div class="border rounded-4 mb-3 d-flex justify-content-center">
                            <img style="maxWidth: 100%, maxHeight: 100vh, margin: auto" class="rounded-4 fit"
                                src="{{ asset('images/posts/' . $postData->image) }}" alt="#" />
                        </div>
                    </aside>
                    <main class="col-lg-6">
                        <div class="ps-lg-3">
                            <h2 class="title text-dark">{{ $postData->title }}</h2>
                            <p>Description: {{ $postData->description }}</p>

                            <div class="row">
                                <dt class="col-2">Type:</dt>
                                <dd class="col-10">{{ $postData->type }}</dd>
                                <dt class="col-2">Topic:</dt>
                                <dd class="col-10">{{ $topicData->name }}</dd>
                            </div>
                            <hr />
                        </div>
                    </main>
                </div>
            </div>
        </section>
        <!-- content -->
        <section class="bg-light border-top py-4">
            <div class="container">
                <div class="row gx-4">
                    <div class="col-lg-8 mb-4">
                        <div class="border rounded-2 px-3 py-2 bg-white">
                            <!-- Pills navs -->
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item d-flex" role="presentation">
                                    <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                        id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                        aria-controls="ex1-pills-1" aria-selected="true">Title</a>
                                </li>
                                <li class="nav-item d-flex" role="presentation">
                                    <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                        id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                                        aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
                                </li>
                                <li class="nav-item d-flex" role="presentation">
                                    <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                        id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                                        aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
                                </li>
                                <li class="nav-item d-flex" role="presentation">
                                    <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                        id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab"
                                        aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
                                </li>
                            </ul>
                            <!-- Pills navs -->
                            <!-- Pills content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    <p>
                                        {{ $postData->detail }}
                                    </p>
                                </div>
                                <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel"
                                    aria-labelledby="ex1-tab-2">
                                    Tab content or sample information now <br />
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                    enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </div>
                                <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel"
                                    aria-labelledby="ex1-tab-3">
                                    Another tab content or sample information now <br />
                                    Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt
                                    mollit anim id est laborum.
                                </div>
                                <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel"
                                    aria-labelledby="ex1-tab-4">
                                    Some other tab content or sample information now <br />
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                            <!-- Pills content -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="px-0 border rounded-2 shadow-0">
                            <div class="card1">
                                <div class="card1-body">
                                    <h5 class="card1-title">Similar post</h5>
                                    @foreach ($listPost as $item)
                                        <x-similar-item-post :item='$item' />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('title', 'Product detail')



@section('footer')
@endsection
