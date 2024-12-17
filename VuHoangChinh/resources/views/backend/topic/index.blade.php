@extends('layouts.admin')
@section('title', 'Topic management')
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
                        <a href="{{ route('admin.topic.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- NOI DUNG --}}
                <div class="row">
                    <div class="col-md-3">
                        {{-- FORM THÊM --}}
                        <form action="{{ route('admin.topic.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name topic</label>
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
                                <button type="submit" name="create" class="btn btn-success">Add topic</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 30px" class="text-center">#</td>
                                    <td>Name topic</td>
                                    <td>Sulg</td>
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
                                        <td class="text-center">
                                            {{ $row->name }}
                                        </td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.topic.status', ['id' => $row->id]) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.topic.status', ['id' => $row->id]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-toggle-off"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.topic.show', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-info">

                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.edit', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.delete', ['id' => $row->id]) }}"
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
