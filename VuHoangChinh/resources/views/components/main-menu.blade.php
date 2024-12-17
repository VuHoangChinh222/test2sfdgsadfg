    <style>
        .navbar-frontend {
            position: absolute;
            left: 0;
            width: 100%;
            z-index: 9;
        }

        .frontend-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 150px;
            z-index: 999;
        }

        .frontend-nav .nav-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .frontend-nav .nav-links li {
            list-style: none;
            margin: 0 10px;
        }

        .frontend-nav .nav-links li a {
            position: relative;
            font-size: 16px;
            font-weight: 500;
            text-transform: capitalize;
            color: var(--color-dark-blue);
            transition: all 0.3s;
        }

        .frontend-nav .nav-links li a:hover,
        .frontend-nav .nav-links li a.active {
            color: var(--color-magenta);
        }

        .frontend-nav .nav-links li a::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: 50%;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: bottom 0.3s 0.3s, width 0.3s, border-radius 0s 0.3s,
                height 0.3s 0.3s, opacity 0.3s 0.1s;
            background-color: var(--color-magenta);
        }

        .frontend-nav .nav-links li a:not(.active):hover::after {
            bottom: -3px;
            width: 100%;
            border-radius: 5px;
            height: 2px;
            opacity: 1;
            transition: bottom 0.3s, width 0.3s 0.3s, border-radius 0s 0.3s,
                height 0.3s 0.3s, opacity 0.3s;
        }

        .frontend-nav .nav-links li a.active::after {
            bottom: -15px;
            opacity: 1;
        }

        /* .frontend-nav .icons {
            display: flex;
            align-items: end;
            margin-left: 100x;
            margin-top: -15px;
        }

        .frontend-nav .icons i {
            position: relative;
            font-size: 20px;
            color: var(--color-dark-blue);
            margin: 0 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .frontend-nav .icons i:hover {
            color: var(--color-magenta);
        }

        .frontend-nav .icons i[data-count]::after {
            content: attr(data-count);
            position: absolute;
            bottom: 2px;
            right: -2px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            background-color: var(--color-magenta);
        } */

        .group {
            display: flex;
            line-height: 28px;
            align-items: center;
            position: relative;
            max-width: 250px;
        }

        .input {
            width: 100%;
            height: 40px;
            line-height: 28px;
            padding: 0 1rem;
            padding-left: 2.5rem;
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            background-color: #f3f3f4;
            color: #0d0c22;
            transition: .3s ease;
        }

        .input::placeholder {
            color: #9e9ea7;
        }

        .input:focus,
        input:hover {
            outline: none;
            border-color: rgba(234, 76, 137, 0.4);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
        }

        .icon {
            position: absolute;
            left: 1rem;
            fill: #9e9ea7;
            width: 1rem;
            height: 1rem;
        }

        a {
            list-style-type: none;
        }
    </style>

    <!-- NAVBAR -->
    <div class="navbar-frontend">
        <nav class="frontend-nav justify-content-center">
            <div class="row ">
                <div class="col-md-1 logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <div class="col-md-7 mt-2 align-self-center">
                    <ul class="nav-links">
                        @foreach ($menu_list as $menu)
                            <x-main-menu-item :$menu />
                        @endforeach
                        @if (Auth::check())
                            @php
                                $user = Auth::user();
                            @endphp
                            <li><a class="nav-link" href={{ route('website.doLogout') }}>Logout</a></li>
                        @else
                            <li><a class="nav-link" href={{ route('website.getRegister') }}>Register</a></li>
                            <li><a class="nav-link" href={{ route('website.getLogin') }}>Login</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('site.product.search') }}" method="GET">
                                @csrf
                                <div class="group">
                                    <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                                        <g>
                                            <path
                                                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                            </path>
                                        </g>
                                    </svg>
                                    <input placeholder="Search" name="query" type="search" class="input">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1 mt-2">
                            @php
                                $count = count(session('carts', []));
                            @endphp
                            <a style="color: #af1713" class="position-relative" href="{{ route('site.cart.index') }}">
                                <i class="fi fi-rr-shopping-bag"></i>
                                <span id="showqty"
                                    class="position-absolute top-0 translate-middle badge rounded-pill bg-danger ms-3">
                                    {{ $count }}
                                </span>
                            </a>
                        </div>
                        <div class="col-md-6 mt-2">
                            <a style="text-decoration: none; color:#af1713" href="#">
                                <i class="fi fi-rr-user"
                                    style="font-style: normal">{{ Auth::user() ? $user->name : '' }}</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
