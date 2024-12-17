@extends('layouts.admin')
@section('title', 'Add post')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add post</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" name="create" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
                                <i class="fa fa-arrow-left"></i> Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" value="{{ old('title') }}" name="title" id="title"
                                    class="form-control">
                                @error('title')
                                    <span class="text-danger">
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
                                <label for="topic_id">Topic</label>
                                <select name="topic_id" id="topic_id" class="form-control">
                                    <option value="">Choice topic</option>
                                    {!! $htmlpostid !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="post" {{ old('type') }}>Post</option>
                                    <option value="page" {{ old('type') }}>Page</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" {{ old('status') }}>Unpublished</option>
                                    <option value="1" {{ old('status') }}>Published</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
