@extends('layouts.site')

@section('header')
    <style>
        .banner {
            height: 450px;
            background: linear-gradient(to right, var(--color-green) 50%, var(--color-dark-blue) 50%);
        }

        .banner .inner {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .banner .inner .left,
        .banner .inner .right {
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .banner .inner .left {
            padding-right: 50px;
        }

        .banner .inner .right {
            padding-left: 50px;
        }

        .banner .inner img {
            width: 60%;
            height: 70%;
            object-fit: contain;
        }

        .banner .content span {
            display: block;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: var(--color-dark-blue);
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .banner .content h2 {
            color: var(--color-white);
            margin-bottom: 30px;
        }

        .banner .content p {
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            color: var(--color-white);
            margin-bottom: 50px;
        }

        .banner .content .btn-private {
            background-color: var(--color-dark-blue);
            border-color: var(--color-dark-blue);
            box-shadow: 0 10px 10px #3c69ff44;
        }

        .banner .content .btn-private::after {
            color: var(--color-dark-blue);
        }

        .banner .right .content span {
            color: var(--color-green);
        }

        .banner .right .content .btn-private {
            background-color: var(--color-green);
            border-color: var(--color-green);
            box-shadow: 0 10px 10px #00ff4444;
        }

        .banner .right .content .btn-private::after {
            color: var(--color-green);
        }

        /* BEST SELLING */
        .best-selling .inner {
            position: relative;
            display: flex;
            height: 550px;
        }

        .best-selling .inner .gradient {
            position: absolute;
            height: 100%;
            width: 40%;
            z-index: -1;
            border-radius: 0 30px 30px 0;
            background: linear-gradient(270deg, var(--color-magenta) 0%, #fff 100%);
        }

        .best-selling .inner .container {
            display: flex;
        }

        .best-selling .inner .left {
            width: 60%;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .best-selling .inner .left img {
            width: 90%;
            object-fit: cover;
        }

        .best-selling .inner .right {
            width: 40%;
        }

        .best-selling .inner .right .content {
            height: 100%;
            padding: 0 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
        }


        /* NEW ARRIVAL */
        .new-arrival .head {
            margin-bottom: 20px;
        }

        .new-arrival p {
            max-width: 300px;
            margin-bottom: 60px;
        }

        .new-arrival h3,
        h6 {
            color: white;
        }




        /* pOPULAR BRANDS */
        .popular-brands {
            position: relative;
            padding: 80px 0;
            background-color: var(--color-gray-100);
        }

        .popular-brands .head h2 {
            text-align: center;
            margin-bottom: 50px;
        }

        .popular-brands .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 300px;
            height: 300px;
            padding: 100px;
            border-radius: 10px;
            background-color: var(--color-white);
        }

        .popular-brands .gradient {
            width: 160px;
            height: 80px;
            border-radius: 0px 0px 80px 80px;
            position: absolute;
            top: 0px;
            left: 40px;
            background: linear-gradient(90deg, rgb(234, 66, 66), rgb(255, 255, 255));
        }
    </style>
@endsection

@section('content')
    <x-flash-sale />
    <x-banner />
    <x-best-selling />
    <x-new-product />
    <x-product-category-home />
    <x-popular-brand />
    <x-post-new />
@endsection

@section('title', 'Home')
