@extends('layouts.admin')

@section('title')
    <title>Thêm mới danh mục sản phẩm</title>
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       @include('partials.content-header', ['name' => 'Category', 'action' => 'Thêm mới sản phẩm'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên danh mục </label>
                                <input type="text" class="form-control" id="category_name" name="name" placeholder="Vui lòng nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_parents">Chọn danh mục cha</label>
                                <select class="form-control" id="category_parents" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOptions !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
