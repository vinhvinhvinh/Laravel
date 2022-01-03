@extends('layouts.admin.master')
@section('title', 'Sửa bánh')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sửa sản phẩm</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.products.update',['id'=>$product->id])}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input disabled name="id" type="text" class="form-control" value="{{$product->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên bánh</label>
                                                <input  name="tenbanh" type="text" class="form-control cc-name valid" value="{{$product->tenbanh}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <input name="mota" type="text" class="form-control" value="{{$product->mota}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá bán</label>
                                                <input  name="giaban" type="tel" class="form-control" value="{{$product->giaban}}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label >Tên hình ảnh</label>
                                                <input  name="hinhanh" type="file" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true">Ảnh cũ: {{$product->hinhanh}}"</span>
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
