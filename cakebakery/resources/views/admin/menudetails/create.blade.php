@extends('layouts.admin.master')
@section('title', 'Thêm chi tiết thực đơn')

@section('content')
<div class="col-lg-9" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
                                <div class="card">
                                    <div class="card-header">...</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Thêm chi tiết thực đơn</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.menudetails.addMenuDetail')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Mã TD</label>
                                                <input disabled type="text" class="form-control" value="{{$recentMenu}}">
                                                <input name="mamenu" type="hidden" class="form-control" value="{{$recentMenu}}">
                                                <h3></h3>
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
                                                <input name="soluong" type="text" class="form-control" value="">
                                                <h3></h3>
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
