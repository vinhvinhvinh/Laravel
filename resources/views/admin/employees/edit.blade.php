@extends('layouts.admin.master')
@section('title', 'Sửa thông tin nhân viên')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sửa thông tin nhân viên</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.employees.update',['id'=>$employee->id])}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input disabled name="id" type="text" class="form-control" value="{{$employee->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên nhân viên</label>
                                                <input  name="tennv" type="text" class="form-control cc-name valid" value="{{$employee->tennv}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <input  name="trangthai" type="tel" class="form-control" value="{{$employee->trangthai}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                                    <span id="payment-button-amount">Lưu thay đổi</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection
