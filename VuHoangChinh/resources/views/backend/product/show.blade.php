@extends('layouts.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')

    <style>
        th {
            text-align: center;
            vertical-align: middle;
        }

        th,
        td {
            vertical-align: middle;
        }
    </style>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        {{-- nút ở đây --}}
                        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Name product</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $product->slug }}</td>
                        </tr>
                        <tr>


                            <td>Image</td>
                            <td>
                                <img style="width: 90px;" src="{{ asset('images/products/' . $product->image) }}"
                                    alt="{{ $product->image }}">
                            </td>

                            {{--  --}}
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Price sale</td>
                            <td>{{ $product->pricesale }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $product->description }}</td>
                        </tr>

                        <tr>
                            <td>Created at</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $product->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>{{ $product->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Updated by</td>
                            <td>{{ $product->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $product->status }}</td>
                        </tr>
                    </tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
@endsection
