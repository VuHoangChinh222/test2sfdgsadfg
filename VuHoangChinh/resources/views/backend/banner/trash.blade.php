@extends('layouts.admin')
@section('title', 'Thùng Rác Banner')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trash banner</h1>
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
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:30px;" class="text-center">#</th>
                            <th style="width: 90px;" class="text-center">Image</th>
                            <th>Name banner</th>
                            <th>Description</th>
                            <th>Status</th>
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
                                    <img src="{{ asset('images/banners/' . $row->image) }}" class="img-fluid"
                                        alt="{{ $row->image }}">
                                </td>
                                {{--  --}}


                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->slug }}</td>
                                @php
                                    $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('admin.banner.show', $args) }}" class="btn btn-sm btn-info mx-1">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{ route('admin.banner.restore', $args) }}"
                                            class="btn btn-sm btn-primary mx-1">
                                            <i class="fas fa-undo-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.banner.destroy', $args) }}" method="post"
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
