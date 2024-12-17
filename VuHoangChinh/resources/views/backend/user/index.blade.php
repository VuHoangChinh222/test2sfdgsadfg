@extends('layouts.admin')
@section('title', 'User management')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User management</h1>
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
                        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add
                        </a>
                        <a href="{{ route('admin.user.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td style="width: 30px" class="text-center">#</td>
                            <td style="width: 90px" class="text-center">Image</td>
                            <td>Full name</td>
                            <td>Username </td>
                            <td>Roles</td>
                            <td style="width: 180px" class="text-center">Action</td>
                            <td style="width: 30px" class="text-center">Id</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('images/users' . $row->image) }}" alt="{{ $row->image }}">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->roles }}</td>
                                <td class="text-center">
                                    @php
                                        $args = ['id' => $row->id];
                                    @endphp
                                    @if ($row->status == 1)
                                        <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.user.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.user.edit', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.user.delete', $args) }}" class="btn btn-sm btn-danger">
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
