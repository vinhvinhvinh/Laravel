@extends('layouts.master')
@section('title','chi tiết đơn hàng')
@section('content')
<style>
    table {

    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
<div class="container rounded bg-white mt-5 mb-5" style="padding-top: 70px">
    <div class="row">
        <div class="col-md-3 border-right" >
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="180px" src="{{asset('admin/images/'.$account->hinhanh)}}" alt="{{$account->id}}"><span class="font-weight-bold">{{$account->username}}</span><span class="text-black-50">{{$account->email}}</span><span> </span></div>
        </div>
        <div class="col-md-4 border-right" style="padding-top: 50px">

            <div class="col-md-12"><label class="labels">Mã hóa đơn</label><input disabled type="email" class="form-control" placeholder="{{$inv->id}}" value=""></div>
            <div class="col-md-6"><label class="labels">Ngày lập</label><input disabled type="text" class="form-control" placeholder="{{$inv->ngaylaphd}}" value=""></div>
            <div class="col-md-6"><label class="labels">Tổng tiền</label><input disabled type="password" class="form-control" placeholder="{{$inv->tongtien}}" value=""></div>
        </div>
        <div class="col-md-5" style="padding-top: 50px">
            <div class="p-7 py-9">
                <div class="d-flex justify-content-between align-items-center experience"><span>Thông tin đơn hàng</span></div><br>
                    <table>
                        <tr>

                            <th>Tên bánh</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>

                        @foreach ($detail as $inv)
                        <tr>

                            <td>{{$inv->tenbanh}}</td>
                            <td>{{$inv->soluong}}</td>
                            <td>{{$inv->dongia}}
                            </td>
                        </tr>
                        @endforeach


                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
