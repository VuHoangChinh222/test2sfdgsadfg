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
                        {{-- Nút ở đây --}}
                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>

                        <a href="{{ route('admin.product.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 30px;" class="text-center">#</th>
                            <th style="width: 90px;" class="text-center">Image</th>
                            <th style="width: auto;" class="text-center">Name product</th>
                            <th style="width: auto;" class="text-center">Slug</th>
                            <th style="width: auto;" class="text-center">Price</th>
                            <th style="width: auto;" class="text-center">Price sale</th>
                            <th style="width: auto;" class="text-center">Category</th>
                            <th style="width: auto;" class="text-center">Brand</th>
                            <th style="width: 180px;" class="text-center">Action</th>
                            <th style="width: 30px;" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('images/products/' . $row->image) }}" class="img-fluid"
                                        alt="{{ $row->image }}">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->pricesale }}</td>
                                <td style="width: auto;" class="text-center">{{ $row->categoryname }}</td>
                                <td style="width: auto;" class="text-center">{{ $row->brandname }}</td>
                                @php
                                    $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    @if ($row->status == 1)
                                        <a href="{{ route('admin.product.status', $args) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.product.status', $args) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.product.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.product.delete', $args) }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
