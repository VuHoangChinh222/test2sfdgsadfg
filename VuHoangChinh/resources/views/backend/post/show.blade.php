@extends('layouts.admin')
@section('title', 'Show post')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show post</h1>
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
                        <a href="{{ route('admin.post.index') }}" class="btn btn-ms btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 30px;" class="text-center">Id</th>
                            <th style="width: 90px;" class="text-center">Image</th>
                            <th>Name post</th>
                            <th>Slug</th>
                            <th>Topic id</th>
                            <th>Detail</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $post->id }}</td>
                            <td class="text-center">
                                <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid"
                                    alt="{{ $post->image }}">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->topic_id }}</td>
                            <td>{{ $post->detail }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>{{ $post->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
