@extends('layouts.admin')

@section('title')
    <title>Cập nhật sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Product', 'action' => 'Cập nhật sản phẩm'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="product_name" value="{{ $product->name }}" name="name" placeholder="Vui lòng nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" class="form-control" id="product_price" value="{{ $product->price }}" name="price" placeholder="Vui lòng nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_future_image">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" id="product_future_image" name="feature_image_path" placeholder="Vui lòng nhập ảnh sản phẩm">
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <img class="feature-image--200" src="{{ $product->feature_image_path }}" alt="featue-image">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="product_future_image">Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" id="product_future_image" name="image_path[]" placeholder="Vui lòng nhập ảnh sản phẩm">
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        @foreach($product->productImages as $productImage)
                                            <div class="col-md-3">
                                                <img class="feature-image--200" src="{{ $productImage->image_path }}" alt="featue-image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="contents">Nội dung</label>
                                <textarea class="form-control tinymce_editor_init" id="contents" name="contents" rows="3">
                                    {{ $product->content }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Chọn danh mục</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOptions !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tags_select_choose">Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" id="tags_select_choose" multiple="multiple">
                                   @foreach($product->tags as $tag)
                                        <option selected value="{{$tag->name}}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-3">Cập nhật</button>
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
