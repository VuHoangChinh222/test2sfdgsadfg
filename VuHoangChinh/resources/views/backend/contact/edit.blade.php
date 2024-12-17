@extends('layouts.admin')
@section('title', 'Cap Nhat Lien He')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quan Ly Danh Muc</h1>
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
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-infor">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>Back to list
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Name contact</label>
                        <input type="text" value="{{ old('name', $contact->name) }}" name="name" id="name"
                            class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control">{{ old('content', $contact->content) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <textarea name="phone" id="phone" class="form-control">{{ old('phone', $contact->phone) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <textarea name="email" id="email" class="form-control">{{ old('email', $contact->email) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Edit contact</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
