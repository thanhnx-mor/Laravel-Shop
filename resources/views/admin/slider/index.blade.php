@extends('layouts.admin')

@section('title')
    <title>Quản lý Slider</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'action' => 'Danh sách slider'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary mb-2">
                                Thêm mới Slider
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key => $slider)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $slider['name'] }}</td>
                                    <td>{{ $slider['description'] }}</td>
                                    <td>
                                        <img class="feature-image" src="{{ $slider['image_path'] }}" alt="image-slider">
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', ['id' => $slider->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('slider.delete', ['id' => $slider->id ]) }}"
                                           data-url="{{ route('slider.delete', ['id' => $slider->id ]) }}"
                                           class="btn btn-danger" id="btnDeleteSlider">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/slider/list.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/index.js') }}"></script>
@endsection
