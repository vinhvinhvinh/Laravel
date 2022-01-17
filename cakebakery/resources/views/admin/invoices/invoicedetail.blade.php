@extends('layouts.admin.master')
@section('title', 'Chi tiết hóa đơn')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:280px;">
    <div class="btn-group" style="padding-left:50px; margin-bottom:10px">
    </div>

    <div class="btn-group" style="padding-left:50px; margin-bottom:10px">

        <h3>Khách hàng: {{$hoaDon->tenkh}}</h2>
    </div>
    <br>
    <div class="btn-group" style="padding-left:105px; margin-bottom:10px;">

        <h3>Ngày lập: {{$hoaDon->ngaylaphd}}</h2>
    </div>
    <br>
    <div class="btn-group" style="padding-left:105px; margin-bottom:10px">

        <h3>Tổng tiền: {{$hoaDon->tongtien}} đ</h2>
    </div>

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-20">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th>Tên bánh</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Đơn giá</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invDetails as $value)
                                <tr>

                                    <td class="text-center"><span>{{$value->id}}</span></td>
                                    <td>{{$value->tenbanh}}</td>
                                    <td class="text-center">{{$value->soluong}}</td>
                                    <td class="text-center">{{$value->dongia}}</td>

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
