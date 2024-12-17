<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">

    <!-- FLATICONS -->
    <link rel="stylesheet" href="{{ asset('icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/uicons-bold-rounded/css/uicons-bold-rounded.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/uicons-solid-straight/css/uicons-solid-straight.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/uicons-brands/css/uicons-brands.css') }}">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>
    @yield('header')
</head>


<body>
    <x-main-menu />
    <!-- HEADER -->
    <div class="header">
        <div class="container">
            <header>
                <div class="left">
                    <h1>Get your awesome sneakers</h1>
                    <p>
                        We offer the best deals in our shop. Check them out now. We have
                        awesome stuff on sale for you.
                    </p>
                    <div class="cta">
                        <button class="btn-private" data-after="Shop Now">Shop Now</button>
                        <i class="fi fi-rr-heart"></i>
                    </div>
                    <div class="specs">
                        <div>
                            <img src="{{ asset('images/checkmark.svg') }}" alt="" />
                            <span>Free shipping</span>
                        </div>
                        <div>
                            <img src="{{ asset('images/checkmark.svg') }}" alt="" />
                            <span>Free returns</span>
                        </div>
                    </div>
                </div>
                <div class="right mt-5">
                    <img src="{{ asset('images/headerBg.png') }}" alt="" class="bg" />
                    {{-- <img src="{{ asset('images/luka2.png') }}" alt="" class="shoe" /> --}}
                    <x-slider />
                </div>
            </header>
        </div>
    </div>


    <main>
        @yield('content')
    </main>


    <x-footer />

    <!-- JQUERY -->
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @yield('footer');
</body>

</html>
