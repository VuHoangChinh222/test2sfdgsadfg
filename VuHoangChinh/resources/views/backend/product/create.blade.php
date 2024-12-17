@extends('layouts.admin')
@section('title', 'Thêm Sản Phẩm')
@section('content')

    <section class="content">
        <section class="content-header">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add product</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Add product</li>
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
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                                        <i class="fa fa-arrow-left"></i> Back to list
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name">Name product</label>
                                        <input type="text" value="{{ old('name') }}" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail">Detail</label>
                                        <textarea name="detail" id="detail" rows="8" class="form-control">{{ old('detail') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">Select category</option>
                                            {!! $htmlcategoryid !!}
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id"
                                            class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="">Select barnd</option>
                                            {!! $htmlbrandid !!}
                                        </select>
                                        @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" value="{{ old('price') }}" name="price" id="price"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pricesale">Price sale</label>
                                        <input type="number" value="{{ old('pricesale') }}" name="pricesale"
                                            id="pricesale" class="form-control ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="qty">Quantity</label>
                                        <input type="number" value="{{ old('qty') }}" name="qty" id="qty"
                                            class="form-control @error('qty') is-invalid @enderror">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="2" selected>Unpublished</option>
                                            <option value="1">Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </section>
    </section>
@endsection
