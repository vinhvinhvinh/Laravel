@extends('layouts.admin.master')
@section('title',$account->username)
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
<div class="container rounded bg-white mt-5 mb-5" style="padding-top: 70px" >
    <div class="row">
        <div class="col-md-3 border-right" >
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="180px" src="{{asset('admin/images/'.$account->hinhanh)}}" alt="{{$account->id}}"><span class="font-weight-bold">{{$account->username}}</span><span class="text-black-50">{{$account->email}}</span><span> </span></div>
        </div>
        <div class="col-md-3 border-right" >
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="180px" src="{{asset('admin/images/'.$account->hinhanh)}}" alt="{{$account->id}}"><span class="font-weight-bold">{{$account->username}}</span><span class="text-black-50">{{$account->email}}</span><span> </span></div>
        </div>
        <div class="col-md-4 border-right">
            <div class="p-3 py-5">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thông tin cá nhân</h4>
                </div>
                <form action="{{route('updateProfileAdmin')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <div class="col-md-4"><label class="labels">Username</label><input name="username" type="text" class="form-control" placeholder="{{$account->username}}" value="{{$account->username}}"></div>
                    <div class="col-md-8"><label class="labels">Họ tên</label><input name="tenkh" type="text" class="form-control" value="{{$account->tenkh}}" placeholder="{{$account->tenkh}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input name="email" type="email" class="form-control" placeholder="{{$account->email}}" value="{{$account->email}}"></div>
                    <div class="col-md-12"><label class="labels">Địa chỉ</label><input name="diachi" type="text" class="form-control" placeholder="{{$account->diachi}}" value="{{$account->diachi}}"></div>

                    {{-- <div class="col-md-12"><label class="labels">Password</label><input name="password" type="password" class="form-control" placeholder="" value=""></div> --}}
                    <div class="form-group">
                        <label >Ảnh</label>
                        <input  name="hinhanh" type="file" class="form-control">
                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true">Ảnh cũ: {{$account->hinhanh}}"</span>
                    </div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
                                {{-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script> --}}

                            @endsection
