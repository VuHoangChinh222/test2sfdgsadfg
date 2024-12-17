@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner Page</li>
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
                        <a href="{{ route('admin.banner.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- NOI DUNG --}}
                <div class="row">

                    {{-- FORM THÊM                --}}
                    <div class="col-md-3">
                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name banner</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="link">Link</label>
                                <input type="text" value="" name="link" id="link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="position">Position</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="0">None</option>
                                    <option value="slideshow">Slideshow</option>
                                </select>
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
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Unpublished</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create" class="btn btn-success">Add baner</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 30px" class="text-center">#</td>
                                    <td>Image</td>
                                    <td>Name banner</td>
                                    <td>Link</td>
                                    <td>Position</td>
                                    <td>Description</td>
                                    <td style="width: 180px" class="text-center">Action</td>
                                    <td style="width: 30px" class="text-center">Id</td>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            <img style="width:100px;height:100px"
                                                src="{{ asset('images/banners/' . $row->image) }}" class="img-fluid"
                                                alt="{{ $row->image }}">
                                        </td>
                                        <td class="text-center">
                                            {{ $row->name }}
                                        </td>
                                        <td>{{ $row->link }}</td>
                                        <td>{{ $row->position }}</td>
                                        <td>{{ $row->description }}</td>

                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.banner.status', ['id' => $row->id]) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.banner.status', ['id' => $row->id]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.banner.show', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.banner.edit', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.banner.delete', ['id' => $row->id]) }}"
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
    </section>
@endsection
