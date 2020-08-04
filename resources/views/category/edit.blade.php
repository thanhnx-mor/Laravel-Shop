@extends('layouts.admin')

@section('title')
    <title>Sửa danh mục sản phẩm</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Category Edit', 'action' => 'Sửa danh mục sản phẩm'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên danh mục </label>
                                <input type="text" class="form-control" id="category_name" value="{!! $category->name !!} " name="name" placeholder="Vui lòng nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_parents">Chọn danh mục cha</label>
                                <select class="form-control" id="category_parents" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOptions !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
