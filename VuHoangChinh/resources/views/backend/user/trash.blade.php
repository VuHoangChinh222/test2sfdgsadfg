@extends('layouts.admin')
@section('title', 'Trash user')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trash user</h1>
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
                        <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
                            <i class="fa fa-arrow-left"></i> Back to list
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
                            <td>Fullname</td>
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
                                    <img src="{{ asset('imagnes/' . $row->image) }}" alt="{{ $row->image }}">
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
                                    <a href="{{ route('admin.user.restore', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-undo-alt" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $args) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>

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
