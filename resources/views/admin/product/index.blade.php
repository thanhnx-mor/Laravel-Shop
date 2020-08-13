@extends('layouts.admin')

@section('title')
    <title>Thanhnx | Danh sách sản phẩm</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'action' => 'Danh sách sản phẩm'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('product.create') }}" class="btn btn-primary mb-2">
                                Thêm mới sản phẩm
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>
                                        <img class="feature-image" src="{{ $product->feature_image_path }}" alt="">
                                    </td>
                                    <td>{{ optional($product->category)->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id ]) }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('product.delete', ['id' => $product->id ]) }}"
                                           class="btn btn-danger" onclick="onHandleDelete()">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $products->links() }}
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
