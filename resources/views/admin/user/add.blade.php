@extends('layouts.admin')

@section('title')
    <title>Thêm mới user</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Thêm mới user'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên user </label>
                                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Vui lòng nhập tên">
                                @error('name')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                                @error('email')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                                @error('password')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user-roles">Vai trò trên trang</label>
                                <select class="form-control" id="user-roles" name="role_ids[]" multiple>
                                    <option value="0">Chọn vai trò</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
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


@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/user/add.js') }}"></script>
@endsection
