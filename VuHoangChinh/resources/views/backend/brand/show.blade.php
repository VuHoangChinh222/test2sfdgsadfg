@extends('layouts.admin')
@section('title', 'Show brand')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show brand</h1>
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
                        <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-info">
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
                            <td>{{ $brand->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $brand->slug }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <img style="width: 90px;" src="{{ asset('images/brands/' . $brand->image) }}"
                                    alt="{{ $brand->image }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Sort_order</td>
                            <td>{{ $brand->sort_order }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $brand->description }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $brand->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $brand->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>{{ $brand->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Updated by</td>
                            <td>{{ $brand->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $brand->status }}</td>
                        </tr>
                    </tbody>
                </table>

                </table>

            </div>
        </div>
    </section>
@endsection
