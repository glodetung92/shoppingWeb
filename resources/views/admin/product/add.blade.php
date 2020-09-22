@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css1')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />

@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Product','key'=>'Add'])
        <form action = "{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Nhập tên sản phẩm"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text"
                                    class="form-control"
                                    name="price"
                                    placeholder="Nhập giá sản phẩm"
                                    value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file"
                                    class="form-control-file"
                                    name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file"
                                    multiple
                                    class="form-control"
                                    name="image_path[]">
                            </div>

                            <div class="form-group">
                                <select class="form-control select2_init"
                                        name="category">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập tag cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea
                                    class="form-control my-editor"
                                    name="contents"
                                    rows="8">{{ old('contents') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
