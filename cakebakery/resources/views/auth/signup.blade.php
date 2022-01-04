@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-content--bge10">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{asset('admin/images/icon/logo.png')}}" alt="CoolAdmin">
                        </a>
                    </div>
                    @if(Session::has("success"))
									<div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success')}}</div>
								@elseif(Session::has("error"))
									<div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('error')}}</div>
								@endif
                    <div class="login-form">
                        <form action="{{route('auth.signup')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Nhập username">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder=" Nhập Password">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="au-input au-input--full" type="text" name="diachi" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label>Tên đầy đủ</label>
                                <input class="au-input au-input--full" type="text" name="tenkh" placeholder="Nhập tên đầy đủ">
                            </div>
                            <div class="form-group">
                                <label >Ảnh</label>
                                    <input  name="hinhanh" type="file" class="form-control" placeholder="Chọn ảnh">
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign up</button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                    <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
