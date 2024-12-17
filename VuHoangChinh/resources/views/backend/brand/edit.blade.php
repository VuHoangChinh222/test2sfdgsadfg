@extends('layouts.admin')
@section('title', 'Edit brand')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit brand</h1>
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
                        <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name', $brand->name) }}" name="name" id="name"
                            class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $brand->description) }}</textarea>
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
                        <button type="submit" name="create" class="btn btn-success">Edit brand</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
