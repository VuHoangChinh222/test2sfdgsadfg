@extends('layouts.admin')
@section('title', 'Order management')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        {{-- nút ở đây --}}
                        <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-info">
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
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td>User id</td>
                            <td>{{ $order->user_id }}</td>
                        </tr>
                        <tr>
                            <td>Delivery name</td>
                            <td>{{ $order->delivery_name }}</td>
                        </tr>
                        <tr>
                            <td>Delivery gender</td>
                            <td>{{ $order->delivery_gender }}</td>
                        </tr>
                        <tr>
                            <td>Delivery email</td>
                            <td>{{ $order->delivery_email }}</td>
                        </tr>
                        <tr>
                            <td>Delivery phone</td>
                            <td>{{ $order->delivery_phone }}</td>
                        </tr>
                        <tr>
                            <td>Delivery address</td>
                            <td>{{ $order->delivery_address }}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{ $order->note }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ $order->type }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated by</td>
                            <td>{{ $order->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    </tbody>
                </table>

                </table>

            </div>
        </div>
    </section>
@endsection
