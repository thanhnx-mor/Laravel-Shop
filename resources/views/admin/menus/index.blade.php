@extends('layouts.admin')

@section('title')
    <title>Quản lý Menus</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'action' => 'Danh sách menu'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('menu.create') }}" class="btn btn-primary mb-2">
                                Thêm mới Menu
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key => $menu)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $menu['name'] }}</td>
                                    <td>
                                        <a href="{{ route('menu.edit', ['id' => $menu->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('menu.delete', ['id' => $menu->id ]) }}"
                                           class="btn btn-danger" onclick="onHandleDelete()">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $menus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function onHandleDelete(e) {
      confirm("Bạn có chắc chắn muốn xoá không?");

    }
</script>
