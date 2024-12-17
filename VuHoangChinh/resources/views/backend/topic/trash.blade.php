@extends('layouts.admin')
@section('title', 'Thùng rác tiêu đề')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trash topic</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trash topic</li>
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td style="width: 30px" class="text-center">#</td>
                            <td>Name topic</td>

                            <td>Position</td>
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


                                <td>{{ $row->description }}</td>
                                <td class="text-center">

                                    <a href="{{ route('admin.topic.show', ['id' => $row->id]) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.topic.restore', ['id' => $row->id]) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-undo-alt" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.topic.destroy', ['id' => $row->id]) }}" method="post"
                                        enctype="multipart/form-data" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger mx-1 d-inline" name="delete" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
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
