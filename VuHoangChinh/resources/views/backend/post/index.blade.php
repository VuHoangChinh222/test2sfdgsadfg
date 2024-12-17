@extends('layouts.admin')
@section('title', 'Post management')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post management</h1>
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
                        <a href="{{ route('admin.post.create') }}" class="btn btn-ms btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                        <a href="{{ route('admin.post.trash') }}" class="btn btn-ms btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th class="text-center" style="width:90px;">Image</th>
                            <th>Name post</th>
                            <th>Topic</th>
                            <th>Type</th>
                            <th class="text-center" style="width:220px;">Action</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" />
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('images/posts/' . $row->image) }}" class="img-fluid"
                                        alt="{{ $row->image }}">
                                </td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->topic_id }}</td>
                                <td>{{ $row->type }}</td>
                                @php
                                    $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    @if ($row->status == 1)
                                        <a href="{{ route('admin.post.status', $args) }}" class="btn btn-ms btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.post.status', $args) }}" class="btn btn-ms btn-danger">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.post.show', $args) }}" class="btn btn-ms btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.post.edit', $args) }}" class="btn btn-ms btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.post.delete', $args) }}" class="btn btn-ms btn-danger">
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
