@extends('layouts.admin')
@section('title', 'Quản Lý Banner')
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
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>ID Banner</td>
                            <td>{{ $banner->id }}</td>
                        </tr>
                        <tr>
                            <td>Name Banner</td>
                            <td>{{ $banner->name }}</td>
                        </tr>

                        <tr>
                            <td>Image</td>
                            <td>
                                <img style="width: 90px;" src="{{ asset('images/banners/' . $banner->image) }}"
                                    alt="{{ $banner->image }}">
                            </td>

                            {{--  --}}
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>{{ $banner->link }}</td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>{{ $banner->position }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $banner->description }}</td>
                        </tr>

                        <tr>
                            <td>Created at</td>
                            <td>{{ $banner->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $banner->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>{{ $banner->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Updated by</td>
                            <td>{{ $banner->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $banner->status }}</td>
                        </tr>
                    </tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
@endsection
