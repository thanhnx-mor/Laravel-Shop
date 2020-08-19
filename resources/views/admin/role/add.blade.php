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
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header--parent">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <strong>Danh sách phân quyền</strong>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div id="accordion-child">
                                                @foreach($permissions as $permision)
                                                    <div class="card">
                                                        <div class="card-header card-header--child">
                                                            <h5 class="mb-0 d-flex">
                                                                <div class="form-check d-flex align-items-center justify-content-center ml-2" data-target="#collapse{{$permision->id}}" data-toggle="collapse">
                                                                    <input class="form-check-input" type="checkbox" value="" id="check-all">
                                                                </div>
                                                                <a class="btn btn-link d-flex align-items-center" data-toggle="collapse" data-target="#collapse{{$permision->id}}" aria-expanded="true" aria-controls="collapse{{$permision->id}}">
                                                                    <strong>{{ $permision->name }}</strong>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse{{$permision->id}}" class="collapse" aria-labelledby="collapse{{$permision->id}}">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach($permision->permissionChildren as $rolePermisson)
                                                                        <div class="col-md-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="{{ $rolePermisson->name }}">
                                                                                <label class="form-check-label" for="{{ $rolePermisson->name }}">
                                                                                    {{ $rolePermisson->name }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

{{--                                                                    <div class="col-md-3">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                                                                            <label class="form-check-label" for="defaultCheck1">--}}
{{--                                                                                Thêm sản phẩm--}}
{{--                                                                            </label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div><div class="col-md-3">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                                                                            <label class="form-check-label" for="defaultCheck1">--}}
{{--                                                                                Sửa sản phẩm--}}
{{--                                                                            </label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-md-3">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                                                                            <label class="form-check-label" for="defaultCheck1">--}}
{{--                                                                                Xoá sản phẩm--}}
{{--                                                                            </label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    $(() => {
        console.log('1');
        $('#collapse').collapse()
        $('#headingOne-child').collapse()
    })
</script>
