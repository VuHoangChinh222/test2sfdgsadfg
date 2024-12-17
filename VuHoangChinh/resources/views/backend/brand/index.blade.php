@extends('layouts.admin')
@section('title', 'Brand management')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand management</h1>
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
                        <a href="{{ route('admin.brand.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        {{-- From Thêm ở đây --}}
                        <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name brand</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sort order</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">None</option>
                                    {!! $htmlsortorder !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Unpublished</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create" class="btn btn-success">Add brand</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;" class="text-center">#</th>
                                    <th style="width: 90px;" class="text-center">Image</th>
                                    <th>Name</th>
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
                                            <img src="{{ asset('images/brands/' . $row->image) }}" class="img-fluid"
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
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.brand.status', $args) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.brand.status', $args) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.brand.show', $args) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('admin.brand.edit', $args) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('admin.brand.delete', $args) }}"
                                                class="btn btn-sm btn-danger">
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
            </div>
        </div>
    </section>
@endsection
