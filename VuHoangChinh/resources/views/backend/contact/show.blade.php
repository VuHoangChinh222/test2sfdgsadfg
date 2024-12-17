@extends('layouts.admin')
@section('title', 'Quan ly lien he')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý contact</h1>
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
                        <a href="{{ route('admin.contact.edit', ['id' => $list->id]) }}" class="btn btn-sm btn-primary">
                            <i class="far fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.contact.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
                            <i class="fa fa-arrow-left"></i> Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30%;">
                                <strong>#</strong>
                            </th>
                            <th class="text-center" style="width:70%;">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $list->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $list->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $list->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $list->phone }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $list->title }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>{{ $list->content }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $list->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $list->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>{{ $list->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Updated by</td>
                            <td>{{ $list->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $list->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>
@endsection
