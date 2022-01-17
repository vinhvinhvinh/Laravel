@extends('layouts.admin.master')
@section('title', 'Thực đơn')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:280px;">
    <div class="btn-group" style="padding-left:50px;">
        <h2>Tổng thực đơn : {{$menuCount}}</h2>
        <a style="font-size:20px;color:white" href="{{route('admin.menus.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm thực đơn    
        </div></a>
        
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
            {{-- {{dd($menu)}} --}}
                <div class="col-lg-12">
                    <div style="width:1200px" class="table-responsive table--no-card m-b-20">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Ngày lập</th>
                                    <th>Nhân viên lập</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menu as $value)
                                <tr>
                                    
                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->ngaylap}}</td>
                                    <td>{{$value->nvlap}}</td>
                                    
                                    <td class="text-right">{{$value->trangthai}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.menudetails.index',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                            <a style="display:contents" href="{{route('admin.menus.delete',['id'=>$value->id])}}">
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
