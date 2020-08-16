@extends('layouts.admin')

@section('title')
    <title>Thêm mới Setting</title>
@endsection
@section('content')
    <div class="content-wrapper">
       @include('partials.content-header', ['name' => 'Menu', 'action' => 'Thêm mới setting'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('setting.store'). '?type=' . request()->type }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="config_key">Config key</label>
                                <input type="text" value="{{ old('config_key') }}" class="form-control @error('config_key') is-invalid @enderror" id="config_key" name="config_key" placeholder="Vui lòng nhập tên config key">
                                @error('config_key')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>


                            @if(request()->type == 0)
                            <div class="form-group">
                                <label for="config_value">Config value</label>
                                <input type="text" value="{{ old('config_value') }}" class="form-control @error('config_value') is-invalid @enderror" id="config_value" name="config_value" placeholder="Vui lòng nhập config value">
                                @error('config_value')
                                <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                @enderror
                            </div>
                            @elseif(request()->type == 1)
                                <div class="form-group">
                                    <label for="config_value">Config value</label>
                                    <textarea name="config_value" id="config_value" rows="3" class="form-control @error('config_value') is-invalid @enderror">{{ old('config_value') }}</textarea>
                                    @error('config_value')
                                    <div class="alert alert-default-danger alert-custom">{{ $message }}</div>
                                    @enderror
                                </div>                            @endif

                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
