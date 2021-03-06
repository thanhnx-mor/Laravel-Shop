@extends('layouts.admin')

@section('title')
    <title>Thêm mới sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Product', 'action' => 'Thêm mới sản phẩm'])
        <div class="c ontent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="product_name"
                                    name="name"
                                    placeholder="Vui lòng nhập tên sản phẩm"
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" value="{{ old('price') }}" class="form-control  @error('price') is-invalid @enderror" id="product_price" name="price" placeholder="Vui lòng nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_future_image">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" id="product_future_image" name="feature_image_path" placeholder="Vui lòng nhập ảnh sản phẩm">
                            </div>

                            <div class="form-group">
                                <label for="product_future_image">Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" id="product_future_image" name="image_path[]" placeholder="Vui lòng nhập ảnh sản phẩm">
                            </div>

                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea class="form-control tinymce_editor_init @error('contents') is-invalid @enderror" id="contents" name="contents" rows="3">
                                    {{ old('contents') }}
                                </textarea>
                                @error('content')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Chọn danh mục</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" multiple="multiple">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOptions !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tags_select_choose">Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" id="tags_select_choose" multiple="multiple">
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-3">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/product/add/index.js') }}"></script>
@endsection
