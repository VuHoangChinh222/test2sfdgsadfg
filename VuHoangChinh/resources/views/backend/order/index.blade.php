@extends('layouts.admin')

@section('header')

@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.order.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Create day</th>
                            <th class="text-center" style="width:200px;">Position</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="" id="">
                                </td>
                                <td>{{ $row->delivery_name }}</td>
                                <td>{{ $row->delivery_phone }}</td>
                                <td>{{ $row->delivery_email }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="text-center">
                                    @php
                                        $argrs = ['id' => $row->id];
                                    @endphp
                                    {{-- <a href="{{ route('admin.order.status', $argrs) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a> --}}
                                    @if ($row->status == 1)
                                        <a href="{{ route('admin.order.status', $argrs) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.order.status', $argrs) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.order.show', $argrs) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.order.delete', $argrs) }}" class="btn btn-sm btn-danger">
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
    </section>
@endsection

@section('title', 'Order management')
