@extends('layouts.admin.master')
@section('title', 'Sửa TK')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sửa tài khoản</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.accounts.update',['id'=>$account->id])}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input disabled name="id" type="text" class="form-control" value="{{$account->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên KH</label>
                                                <input  name="tenkh" type="text" class="form-control cc-name valid" value="{{$account->tenkh}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" type="text"  class="form-control" value="{{$account->username}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div> --}}
                                            <!-- <div class="form-group">
                                                <label>Password</label>
                                                <input  name="password" type="tel" class="form-control" value="{{$account->password}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div> -->
                                            <div class="form-group">
                                                <label >Ảnh</label>
                                                <input  name="hinhanh" type="file" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true">Ảnh cũ: {{$account->hinhanh}}"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input  name="diachi" type="text" class="form-control cc-name valid" value="{{$account->diachi}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" value="{{$account->email}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Loại tk</label>
                                                <input  name="loaitk" type="tel" class="form-control" value="{{$account->loaitk}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <input  name="trangthai" type="tel" class="form-control" value="{{$account->trangthai}}">
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
