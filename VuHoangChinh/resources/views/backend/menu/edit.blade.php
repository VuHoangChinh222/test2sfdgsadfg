@extends('layouts.admin')

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu management</h1>
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
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.menu.trash') }}">
                            <i class="fas fa-trash"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" name="create" class="btn btn-sm btn-success">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                                    <i class="fa fa-arrow-left"></i> Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name">Title</label>
                                        <input type="text" value="{{ old('name', $menu->name) }}" name="name"
                                            id="name" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="link">Link</label>
                                        <input type="text" value="{{ old('link', $menu->link) }}" name="link"
                                            id="name" class="form-control">
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="position">Position</label>
                                        <select name="postion" id="postion" class="form-control">
                                            <option value="mainmenu">Main Menu</option>
                                            <option value="footermenu">Footer Menu</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="parentId">Parent</label>
                                        <select name="parentId" id="parentId" class="form-control">
                                            <option value="0">No have parent</option>
                                            {!! $htmlParentId !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="sort_order">Sort order</label>
                                        <select name="sort_order" id="sort_order" class="form-control">
                                            <option value="0">Null</option>
                                            {!! $htmlSortOrder !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="2"
                                                {{ old('status', $menu->status) == 2 ? 'selected' : '' }}>
                                                Unpublished</option>
                                            <option value="1"
                                                {{ old('status', $menu->status) == 1 ? 'selected' : '' }}>
                                                Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('title', 'Menu Update')
