@extends('layouts.admin')

@section('title')
    <title>Quản lý Setting</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'action' => 'Danh sách Setting'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
{{--                            <a href="{{ route('setting.create') }}" class="btn btn-primary mb-2">--}}
{{--                                Thêm mới setting--}}
{{--                            </a>--}}

                            <div class="btn-group">
                                <div class="btn btn-primary dropdown-toggle mb-2" data-toggle="dropdown" href="#">
                                    Add new
                                    <span class="caret"></span>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('setting.create'). '?type=0' }}">Text</a></li>
                                    <li><a class="dropdown-item" href="{{ route('setting.create'). '?type=1' }}">Textarea</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $key => $setting)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $setting->config_key }}</td>
                                    <td>{{ $setting->config_value }}</td>
                                    <td>
                                        <a href="{{ route('setting.edit', ['id' => $setting->id ]) . '?type=' . $setting->type  }}"
                                           class="btn btn-secondary mr-2">Edit</a>
                                        <a href="{{ route('setting.delete', ['id' => $setting->id ]) }}"
                                           data-url="{{ route('setting.delete', ['id' => $setting->id ]) }}"
                                           class="btn btn-danger" id="btnDeleteSetting">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $settings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/setting/list.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/index.js') }}"></script>
@endsection
