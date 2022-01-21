@extends('layouts.admin.master')
@section('title', 'Sửa chi tiết thực đơn')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sửa chi tiết thực đơn</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.menudetails.update')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <label>Id</label> --}}
                                                <input name="id" type="hidden" class="form-control" value="{{$menu->id}}">
                                            </div>
                                            <div class="form-group">
                                                {{-- <label>Mã Menu</label> --}}
                                                <input  name="mamenu" type="hidden" class="form-control cc-name valid" value="{{$menu->mamenu}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã bánh</label>
                                                {{-- <input name="nvlap" type="text" class="form-control" value={{$idNhanvien}}> --}}
                                                <select name="mabanh">
                                                    @foreach($products as $p)
                                                    <option value="{{$p->id}}">{{$p->id}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng</label>
                                                <input  name="soluong" type="text"     class="form-control cc-name valid" value="{{$menu->soluong}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
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
