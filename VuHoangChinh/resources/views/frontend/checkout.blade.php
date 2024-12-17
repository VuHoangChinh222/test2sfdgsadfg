@extends('layouts.site')

@section('header')
@endsection

@section('content')
    <div class="container">
        <h1>CHECK OUT</h1>
        <div class="row d-flex">
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="width:98px">Image</th>
                            <th>Name product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalMoney = 0;
                        @endphp
                        @foreach ($list_cart as $row_cart)
                            <tr>
                                <td>{{ $row_cart['id'] }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/products/' . $row_cart['image']) }}"
                                        alt="{{ $row_cart['image'] }}">
                                </td>
                                <td>{{ $row_cart['name'] }}</td>
                                <td>{{ $row_cart['qty'] }}</td>
                                <td>{{ number_format($row_cart['price']) }}</td>
                                <td>{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            </tr>
                            @php
                                $totalMoney += $row_cart['price'] * $row_cart['qty'];
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <strong>Total order: {{ number_format($totalMoney) }}</strong>
            </div>
        </div>
        @if (!Auth::check())
            <div class="row">
                <div class="col-12">
                    <h3>Please log in to pay</h3>
                    <a href="{{ route('website.getLogin') }}">
                        <button type="button" class="btn btn-success">Login</button>
                    </a>
                </div>
            </div>
        @else
            <form action="{{ route('site.cart.docheckout') }}" method="POST">
                @csrf
                <div class="row my-5">
                    @php
                        $user = Auth::user();
                    @endphp
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Full name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Note</label>
                            <textarea type="text" name="note" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Buy</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection

@section('title', 'Checkout')

@section('footer')
@endsection
