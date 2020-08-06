@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa Menu</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Chỉnh sửa Menu'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('menu.update', ['id'=> $menu->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên menu </label>
                                <input type="text" class="form-control" id="menu_name" value="{{ $menu->name }}" name="name" placeholder="Vui lòng nhập tên menu">
                            </div>
                            <div class="form-group">
                                <label for="menu_parents">Chọn menu cha</label>
                                <select class="form-control" id="menu_parents" name="parent_id">
                                    <option value="0">Chọn menu</option>
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
