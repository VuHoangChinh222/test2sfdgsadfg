@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit user</h1>
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
                            <button type="submit" name="update" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
                                <i class="fa fa-arrow-left"></i> Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Full name</label>
                                <input type="text" value="{{ old('name', $user->name) }}" name="name" id="name"
                                    class="form-control">
                            </div>
                            @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{ old('phone', $user->phone) }}" name="phone" id="phone"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" value="{{ old('email', $user->email) }}" name="email" id="email"
                                    class="form-control">
                            </div>
                            @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" value="{{ old('address', $user->address) }}" name="address"
                                    id="address" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" value="{{ old('username', $user->username) }}" name="username"
                                    id="username" class="form-control">
                            </div>
                            @error('username')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" value="" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password_re">Confirm password</label>
                                <input type="password" value="" name="password_re" id="password_re"
                                    class="form-control">
                            </div>
                            @error('password_re')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="mb-3">
                                <label for="roles">Role</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="customer">Customer</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Unpublished</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection
