@extends('layouts.admin.master')
@section('title', 'Thêm hóa đơn')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Thêm hóa đơn</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.invoices.addInvoice')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input name="id" type="text" class="form-control" value="{{$finalId}}">
                                                <h3></h3>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã Khách hàng</label>
                                                <input  name="matk" type="text" class="form-control cc-name valid" >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày lập HĐ</label>
                                                <input name="ngaylaphd" type="date" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Nhân viên lập</label>
                                                <input  name="nvlap" type="text" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label >Tổng tiền</label>
                                                <input  name="tongtien" type="text" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>


                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                                    <span id="payment-button-amount">Thêm</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection
