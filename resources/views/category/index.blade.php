@extends('layouts.admin')

@section('title')
    <title>Thanh dep trai</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'action' => 'Danh sách sản phẩm'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">
                                Thêm mới danh mục sản phẩm
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $category['name'] }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['id' => $category->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('categories.delete', ['id' => $category->id ]) }}"
                                           class="btn btn-danger" onclick="onHandleDelete()">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $categories->links() }}
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
