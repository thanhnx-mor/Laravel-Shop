@extends('layouts.admin')

@section('title')
    <title>Quản lý Roles</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'action' => 'Danh sách Roles'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('role.create') }}" class="btn btn-primary mb-2">
                                Thêm mới Role
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $role)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $role['name'] }}</td>
                                    <td>{{ $role['display_name'] }}</td>
                                    <td>
                                        <a href="{{ route('role.edit', ['id' => $role->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('role.delete', ['id' => $role->id ]) }}"
                                           data-url="{{ route('role.delete', ['id' => $role->id ]) }}"
                                           class="btn btn-danger" id="btnDeleteSlider">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $roles->links() }}
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
