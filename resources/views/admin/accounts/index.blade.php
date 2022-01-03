@extends('layouts.admin.master')
@section('title', 'Taikhoan')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:280px;">
    <div class="btn-group" style="padding-left:50px;">
        <h2>Tổng tài khoản: {{$accountCount}}</h2>
        <a style="font-size:20px;color:white" href="{{route('admin.accounts.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm tài khoản  
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
                                    <th>Tên TK</th>
                                    <th>Username</th>
                                    <th class="text-right">Giá bán</th>
                                    <th class="text-right">Hình ảnh </th>
                                    <th class="text-right">Password</th>
                                    <th class="text-right">Địa chỉ</th>
                                    <th class="text-right">Email </th>
                                    <th class="text-right">Loại TK </th>
                                    <th class="text-right">Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($account as $value)
                                <tr>
                                    
                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->tenkh}}</td>
                                    <td>{{$value->username}}</td>
                                    <td class="text-right">{{$value->password}}</td>
                                    <td class="text-right">{{$value->diachi}}</td>
                                    <td class="text-right">{{$value->email}}</td>
                                    <td class="text-right">{{$value->loaitk}}</td>
                                    <td class="text-right">{{$value->trangthai}}</td>
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