@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Menu','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menu.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($menu as $menuItem)                            
                                <tr>
                                    <th>{{ $menuItem->id }}</th>
                                    <td>{{ $menuItem->name }}</td>
                                    <td>
                                        <a href="{{ route('menu.edit', ['id' => $menuItem->id]) }}" class="btn btn-default">Edit</a>
                                        <a href="{{ route('menu.delete', ['id' => $menuItem->id]) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menu->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
  