@extends('layouts.admin.master')
@section('title', 'Nhân viên')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
    <div class="btn-group" style=" margin-bottom:10px">
        <h2>Tổng nhân viên: {{$accountCount}}</h2>
        <a style="font-size:20px;color:white" href="{{route('admin.accounts.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm nhân viên
        </div></a>

    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-20">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên nhân viên</th>
                                    <th>Username</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($account as $value)
                                <tr>

                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->tenkh}}</td>
                                    <td>{{$value->username}}</td>
                                    @if($value->trangthai==1)
                                    <td class="text-right" style="color: greenyellow"> Hoạt động</td>

                                    @else
                                        <td class="text-right" style="color: red">Bị khóa</td>

                                    @endif
                                    @if($value->trangthai==1)
                                    <td><a href="{{route('voHieuHoa',['id'=>$value->id])}}">Vô hiệu hóa</a></td>

                                    @else
                                    <td><a href="{{route('voHieuHoa',['id'=>$value->id])}}">Kích hoạt</a></td>

                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.accounts.edit',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                            <a style="display:contents" href="{{route('admin.accounts.delete',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip"  data-placement="top" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button></a>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
