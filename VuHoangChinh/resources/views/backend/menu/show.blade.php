@extends('layouts.admin')

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Show</h1>
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
                        <a href="{{ route('admin.menu.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Trash
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
                            <th style="width: 30px;" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->link }}</td>
                            <td>{{ $menu->sort_order }}</td>
                            <td>{{ $menu->parent_id }}</td>
                            <td>{{ $menu->position }}</td>
                            <td class="text-center">
                                {{ $menu->id }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('title', 'Menu Show')
