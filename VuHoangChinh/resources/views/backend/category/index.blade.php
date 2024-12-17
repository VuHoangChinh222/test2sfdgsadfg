@extends('layouts.admin')

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category management</h1>
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
                        <a href="{{ route('admin.category.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">Add form
                        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                            {{-- Thêm tính bảo mật cho form nếu không có thì dữ liệu của form ở dạng post sẽ không được gửi qua --}}
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name category</label>
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
                                <label for="parent_id">Parent category</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!! $htmlparentid !!}
                                </select>
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
                                    <option value="1">Publish</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create" class="btn btn-success">Add category</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 30px;" class="text-center">#</th>
                                    <th style="width: 90px;" class="text-center">Image</th>
                                    <th>Name category</th>
                                    <th>Slug</th>
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
                                        <td class="text-center">
                                            <img style="width: 90px;" src="{{ asset('images/categories/' . $row->image) }}"
                                                alt="{{ $row->image }}">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td class="text-center">
                                            @php
                                                $argrs = ['id' => $row->id];
                                            @endphp
                                            <?php if ($row->status == 1): ?>
                                            <a href="{{ route('admin.category.status', $argrs) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                            <?php 
                                                endif;
                                                if($row->status ==2): 
                                            ?>

                                            <a href="{{ route('admin.category.status', $argrs) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                                endif;
                                             ?>
                                            <a href="{{ route('admin.category.show', $argrs) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.category.edit', $argrs) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.category.delete', $argrs) }}"
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

@section('title', 'Category management')
