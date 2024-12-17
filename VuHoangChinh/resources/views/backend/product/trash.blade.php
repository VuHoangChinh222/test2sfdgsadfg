@extends('layouts.admin')
@section('title', 'Trash product')
@section('content')
    <section class="content">
        <div class="card">
            <div>
                <h1>Trash product</h1>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
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
                            <th style="width: auto;" class="text-center">Quantity</th>
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
                                <td>{{ $row->qty }}</td>
                                <td style="width: auto;" class="text-center">{{ $row->categoryname }}</td>
                                <td style="width: auto;" class="text-center">{{ $row->brandname }}</td>
                                @php
                                    $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('admin.product.show', $args) }}"
                                            class="btn btn-sm btn-info mx-1">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{ route('admin.product.restore', $args) }}"
                                            class="btn btn-sm btn-primary mx-1">
                                            <i class="fas fa-undo-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.product.destroy', $args) }}" method="post"
                                            enctype="multipart/form-data" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger mx-1" name="delete" type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
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
