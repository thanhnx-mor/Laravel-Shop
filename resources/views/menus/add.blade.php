@extends('layouts.admin')

@section('title')
    <title>Thêm mới Menu</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Thêm mới Menu'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên menu </label>
                                <input type="text" class="form-control" id="category_name" name="name" placeholder="Vui lòng nhập tên menu">
                            </div>
                            <div class="form-group">
                                <label for="category_parents">Chọn menu cha</label>
                                <select class="form-control" id="category_parents" name="parent_id">
                                    <option value="0">Chọn menu</option>
                                    {!! $menus !!}
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
