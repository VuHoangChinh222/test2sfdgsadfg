@extends('layouts.site')


@section('content')
    <div class="container">
        <h1>MY CART</h1>
        <form action="{{ route('site.cart.update') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:98px">Image</th>
                        <th>Name product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
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
                            <td>
                                <input type="number" style="width:5rem" min="1" name="qty[{{ $row_cart['id'] }}]"
                                    value="{{ $row_cart['qty'] }}">
                            </td>
                            <td>{{ number_format($row_cart['price']) }}</td>
                            <td>{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            <td class="text-center">
                                <a href="{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}"
                                    class="btn btn-danger btn-sm">X</a>
                            </td>
                        </tr>
                        @php
                            $totalMoney += $row_cart['price'] * $row_cart['qty'];
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <a class="btn btn-success px-3" href="{{ route('site.home') }}">Buy more</a>
                            <button type="submit" class="btn btn-primary px-3">Update</button>
                            @if ($totalMoney == 0)
                                <a class="btn btn-info px-3 disabled" href="{{ route('site.cart.checkout') }}">Place
                                    order</a>
                            @else
                                <a class="btn btn-info px-3" href="{{ route('site.cart.checkout') }}">Place order</a>
                            @endif
                        </th>
                        <th colspan="3" class="text-end">
                            <strong>Total order: {{ number_format($totalMoney) }}</strong>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
@endsection

@section('title', 'Cart')



@section('footer')
@endsection
