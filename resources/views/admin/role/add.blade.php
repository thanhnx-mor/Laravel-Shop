@extends('layouts.admin')

@section('title')
    <title>Thêm mới vai trò</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Thêm mới vai trò'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="slider_name">Tên vai trò </label>
                                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="slider_name" name="name" placeholder="Vui lòng nhập tên slider">
                                @error('name')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="display_name">Mô tả vai trò</label>
                                <input type="text" class="form-control @error('display_name') is-invalid @enderror" id="display_name" name="display_name">
                                @error('display_name')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
