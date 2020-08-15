@extends('layouts.admin')

@section('title')
    <title>Sửa Slider</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Sửa Slider'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="slider_name">Tên Slider </label>
                                <input type="text" value="{{ $slider->name }}" class="form-control @error('name') is-invalid @enderror" id="slider_name" name="name" placeholder="Vui lòng nhập tên slider">
                                @error('name')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả ngắn</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{$slider->description}}</textarea>
                                @error('description')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image_path">Hình ảnh</label>
                                <input type="file" value="{{ $slider->image_path }}" class="form-control-file @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <img class="feature-image--200" src="{{ $slider->image_path }}" alt="featue-image">
                                    </div>
                                </div>
                                @error('image_path')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
