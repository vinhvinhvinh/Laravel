@extends('layouts.admin.master')
@section('title', 'Hóa đơn')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:280px;">
    <div class="btn-group" style="padding-left:50px; margin-bottom:10px">
        <h2>Tổng hóa đơn: {{$invoiceCount}}</h2>
        {{-- <a style="font-size:20px;color:white" href="{{route('admin.invoices.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm hóa đơn
        </div></a> --}}

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
                                    <th>Tài khoản</th>
                                    <th>Ngày lập</th>
                                    <th class="text-right">Nhân viên lập</th>
                                    <th class="text-right">Tổng tiền</th>
                                    <th class="text-right">Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice as $value)
                                <tr>

                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->matk}}</td>
                                    <td>{{$value->ngaylaphd}}</td>
                                    <td class="text-right">{{$value->nvlap}}</td>
                                    <td class="text-right">{{$value->tongtien}}</td>
                                    @if ($value->trangthai==1)
                                    <td class="text-right" style="color: greenyellow">Đã duyệt</td>

                                    @else
                                    <td class="text-right" style="color: red">Chưa duyệt</td>
                                    @endif

                                    @if ($value->trangthai==1)
                                    <td >
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.invoices.detail',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                           </div>
                                    </td>
                                    @else
                                    <td >
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.invoices.detail',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                            <a style="display:contents" href="{{route('duyetHD',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip"  data-placement="top" title="Duyệt">
                                                <i class="fa fa-check-square"></i>
                                            </button></a>

                                        </div>
                                    </td>
                                    @endif

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
