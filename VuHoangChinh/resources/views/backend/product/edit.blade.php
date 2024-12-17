@extends('layouts.admin')
@section('title', 'Cập Nhật Sản Phẩm')
@section('content')

    <section class="content">
        <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit product</h1>
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
                                    <input type="text" value="{{ old('name', $product->name) }}" name="name"
                                        id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="detail">Detail</label>
                                    <textarea name="detail" id="detail" rows="8" class="form-control">{{ old('detail', $product->detail) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select category</option>
                                        {!! $htmlcategoryid !!}

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="">Select brand</option>
                                        {!! $htmlbrandid !!}

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" value="{{ old('price', $product->price) }}" name="price"
                                        id="price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="pricesale">Price sale</label>
                                    <input type="number" value="{{ old('pricesale', $product->pricesale) }}"
                                        name="pricesale" id="pricesale" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="qty">Quantity</label>
                                    <input type="number" value="{{ old('qty', $product->qty) }}" name="qty"
                                        id="qty" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2"
                                            {{ old('status', $product->status) == '2' ? 'selected' : '' }}>Unpublished
                                        </option>
                                        <option value="1"
                                            {{ old('status', $product->status) == '1' ? 'selected' : '' }}>Published
                                        </option>
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
