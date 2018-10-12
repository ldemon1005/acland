@extends('admin.master')
@section('title', 'Quản trị')
@section('main')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 ">Danh sách Thông tin đăng ký</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách Thông tin đăng ký</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="padding: 20px">
                            <div class="row">
                                <form action="" method="get">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">

                                        <div class="input-group input-group-sm float-right" style="width: 100%;">
                                            <input type="text" name="search" class="form-control pull-right"
                                                   placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i
                                                            class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Họ và tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_info as $info)
                                    <tr>
                                        <td>{{$info->name}}</td>
                                        <td>{{$info->email}}</td>
                                        <td>{{$info->name}}</td>
                                        <td>{{$info->phone}}</td>
                                        <td>{{date('d/m/Y H:m',$info->created_at)}}</td>
                                        <td class="text-center">
                                            <button id="{{$info->id}}" onclick="update_status({{$info->id}})"
                                                    class="btn btn-block btn-sm {{$info->status == 2 ? 'btn-success': 'btn-danger'}}">{{$info->status == 2 ? 'Hoạt đông': 'Không hoạt đông'}}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row form-group pull-right" style="margin: 10px 0px">
                                {{$list_info->links()}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="history_articel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>
@stop

@section('css')
@stop

@section('script')
    <script>
        function update_status(id) {
            console.log(id);
            $.ajax({
                url: '/admin/customer-info/update_status_info/' + id,
                method: 'get',
                dataType: 'json',
            }).fail(function (ui, status) {
            }).done(function (data, status) {
                if (data.info) {
                    data.info = JSON.parse(data.info);
                    console.log(data.info.status);

                    var id = '#' + data.info.id;

                    if (data.info.status == 2) {
                        $(id).removeClass('btn-danger');
                        $(id).addClass('btn-success');
                        $(id).html('Hoạt động');
                    } else {
                        $(id).removeClass('btn-success');
                        $(id).addClass('btn-danger');
                        $(id).html('Không hoạt động');
                    }
                }
            });
        }
    </script>
@stop