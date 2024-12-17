@extends('layouts.admin')
@section('title', 'Edit Banner')
@section('content')

    <section class="content">
        <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Banner</h1>
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
                                <button type="submit" name="create" class="btn btn-sm btn-success">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index') }}">
                                    <i class="fa fa-arrow-left"></i> Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="name">Name banner</label>
                                    <input type="text" value="{{ old('name', $banner->name) }}" name="name"
                                        id="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $banner->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        @if ($banner->status == '2')
                                            <option value="2" selected>Unpublished</option>
                                            <option value="1">Published</option>
                                        @else
                                            <option value="2">Unpublished</option>
                                            <option value="1" selected>Published</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

    </section>
@endsection
