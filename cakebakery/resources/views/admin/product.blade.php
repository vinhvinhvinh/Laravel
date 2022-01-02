@extends('layouts.admin.master')
@section('title', 'Bánh')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:280px;">
    <div class="btn-group" style="padding-left:50px;">
        <h2>Tổng sản phẩm: {{$productCount}}</h2>
        <a style="font-size:20px;color:white" href="{{route('admin.products.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm bánh    
        </div></a>
        
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
            {{-- {{dd($product)}} --}}
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-20">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên bánh</th>
                                    <th>Mô tả</th>
                                    <th class="text-right">Giá bán</th>
                                    <th class="text-right">Hình ảnh </th>
                                    <th class="text-right">Tình trạng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $value)
                                <tr>
                                    
                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->tenbanh}}</td>
                                    <td>{{$value->mota}}</td>
                                    <td class="text-right">{{$value->giaban}}</td>
                                    
                                    <td class="text-right"><img width=100 height=80 src="{{asset('img/cake-feature/'.$value->hinhanh)}}" alt=""></td>
                                    <td class="text-right">{{$value->tinhtrang}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.products.edit',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                            <a style="display:contents" href="{{route('admin.products.delete',['id'=>$value->id])}}">
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
