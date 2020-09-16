@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Slider','key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action = "{{ route('slider.update', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       placeholder="Nhập tên Slider"
                                       value="{{ $slider->name }}">      
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name = "description" 
                                          rows="4"
                                          class="form-control @error('description') is-invalid @enderror"
                                          >{{ $slider->description }}</textarea>             
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file"
                                       class="form-control-file @error('image_path') is-invalid @enderror" 
                                       name="image_path">     
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_slider" src="{{ $slider->image_path }}" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
  