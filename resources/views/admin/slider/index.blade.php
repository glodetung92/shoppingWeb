@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/list.css') }}" />
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('admins/slider/index/list.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Slider','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Slider</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $sliderItem)   
                                <tr>
                                    <th>{{ $sliderItem->id }}</th>
                                    <td>{{ $sliderItem->name }}</td>
                                    <td>{{ $sliderItem->description }}</td>
                                    <td>
                                        <img class="sliderImage" src="{{ $sliderItem->image_path }}" alt="" />
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', ['id' => $sliderItem->id]) }}" class="btn btn-default">Edit</a>
                                        <a href=""
                                           class="btn btn-danger action_delete"
                                           data-url="{{ route('slider.delete', ['id' => $sliderItem->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
  