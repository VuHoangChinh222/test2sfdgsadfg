@extends('layouts.admin')
@section('title', 'Edit topic')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Topic</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Topic</li>
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
                        {{-- NUT --}}
                        <a href="{{ route('admin.topic.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- NOI DUNG --}}
                <form action="{{ route('admin.topic.update', ['id' => $topic->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Name topic</label>
                        <input type="text" value="{{ old('name', $topic->name) }}" name="name" id="name"
                            class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ $topic->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sort_order">Sort order</label>
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="0">None</option>
                            {!! $htmlsortorder !!}

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
