@extends('layouts.admin')
@section('title', 'Topic show')
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
                        <a href="{{ route('admin.topic.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to list
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- NOI DUNG --}}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <td>Name topic</td>
                            <td>Sulg</td>
                            <td>Description</td>
                            <td>Sort Order</td>
                            <td>Created At</td>
                            <td>Update At</td>
                            <td>Create by</td>
                            <td>Update by</td>
                            <td style="width: 30px" class="text-center">Id</td>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center">{{ $topic->name }}</td>
                            <td>{{ $topic->slug }}</td>
                            <td>{{ $topic->description }}</td>
                            <td>{{ $topic->sort_order }}</td>
                            <td>{{ $topic->created_at }}</td>
                            <td>{{ $topic->updated_at }}</td>
                            <td>{{ $topic->created_by }}</td>
                            <td>{{ $topic->updated_by }}</td>
                            <td class="text-center">{{ $topic->id }}</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
@endsection
