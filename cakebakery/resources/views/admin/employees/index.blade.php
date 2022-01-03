@extends('layouts.admin.master')
@section('title', 'Nhân viên')

@section('content')
<div class="main-content" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:100px;padding-left:350px;">
    <div class="btn-group" style=" margin-bottom:10px">
        <h2>Tổng nhân viên: {{$employeeCount}}</h2>
        <a style="font-size:20px;color:white" href="{{route('admin.employees.create')}}"><div style="padding:10px;background-color:grey;border:solid 2px black">
            Thêm nhân viên
        </div></a>

    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-20">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên nhân viên</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee as $value)
                                <tr>

                                    <td><span>{{$value->id}}</span></td>
                                    <td>{{$value->tennv}}</td>
                                    <td>{{$value->trangthai}}</td>

                                    <td >
                                        <div class="table-data-feature">
                                            <a style="display:contents" href="{{route('admin.employees.edit',['id'=>$value->id])}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            </a>
                                            <a style="display:contents" href="{{route('admin.employees.delete',['id'=>$value->id])}}">
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
