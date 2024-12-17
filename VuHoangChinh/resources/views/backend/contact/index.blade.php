@extends('layouts.admin')
@section('title', 'Quan Ly Lien He')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact management</h1>
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
                        <a href="{{ route('admin.contact.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Delete
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Content</th>
                            <th style="width:180px"class="text-center">Action</th>
                            <th style="width:30px"class="text-center">Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->content }}</td>
                                <td class="text-center">
                                    @php
                                        $args = ['id' => $row->id];
                                    @endphp
                                    @if ($row->status == 1)
                                        <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.contact.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.contact.edit', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.contact.delete', $args) }}" class="btn btn-sm btn-danger">
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
