@extends('layouts.admin')

@section('title')
    <title>Quản lý Users</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'action' => 'Danh sách Users'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">
                                Thêm mới user
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Chức danh</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['display_name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', ['id' => $user->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('user.delete', ['id' => $user->id ]) }}"
                                           data-url="{{ route('user.delete', ['id' => $user->id ]) }}"
                                           class="btn btn-danger" id="btnDeleteSlider">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $users->links() }}
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
