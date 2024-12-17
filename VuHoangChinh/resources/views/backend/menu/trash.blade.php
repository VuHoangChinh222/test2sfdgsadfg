@extends('layouts.admin')

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu trash</h1>
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
                        <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
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
                            <th>Name</th>
                            <th>Link</th>
                            <th>Sort order</th>
                            <th>Parent id</th>
                            <th>Position</th>
                            <th style="width: 180px;" class="text-center">Action</th>
                            <th style="width: 30px;" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="" id="">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->link }}</td>
                                <td>{{ $row->sort_order }}</td>
                                <td>{{ $row->parent_id }}</td>
                                <td>{{ $row->position }}</td>
                                @php
                                    $argrs = ['id' => $row->id];
                                @endphp
                                <td class="text-center d-flex">
                                    <a href="{{ route('admin.menu.show', $argrs) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.restore', $argrs) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-undo-alt" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $argrs) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
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

@section('title', 'Menu trash')
