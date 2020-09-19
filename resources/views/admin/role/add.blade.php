@extends('layouts.admin')

@section('title')
    <title>Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/permission/add/add.css') }}">
@endsection

@section('js')
    <script src="{{ asset('admins/permission/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Role','key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action = "{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên vai trò</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Nhập tên vai "
                                           value="{{ old('name') }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <input type="text"
                                           class="form-control @error('display_name') is-invalid @enderror"
                                           name="display_name"
                                           placeholder="Nhập mô tả vai trò"
                                           value="{{ old('display_name') }}">
                                    @error('display_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        Checkall
                                    </label>
                                </div>

                                @foreach($permissionsParent as $permissionsParentItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <label>
                                            <input type="checkbox" value="{{ $permissionsParentItem->id }}" class="checkbox_wrapper">
                                        </label>
                                        Module {{ $permissionsParentItem->name }}
                                    </div>
                                    <div class="row">
                                        @foreach($permissionsParentItem->permissionChildren as $permissionChildrenItem)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" name="permission_id[]"
                                                    class="checkbox_children" value="{{ $permissionChildrenItem->id }}">
                                                </label>
                                                {{ $permissionChildrenItem->name }}
                                            </h5>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
