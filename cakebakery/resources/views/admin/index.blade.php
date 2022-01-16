@extends('layouts.admin.master')
@section('title', 'Trang chủ')

@section('content')
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">DASH BOARD</h2>

                        </div>
                    </div>
                </div>
                <div class="row m-t-25">

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        @foreach ($soHoaDonBanTrongNgay as $value)
                                        <h2>{{$value->tong_hoa_don}}</h2>
                                        @endforeach
                                        <span>Hóa đơn bán/ngày</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        @foreach ($soBanhTieuThuTrongNgay as $value)
                                        <h2>{{$value->tong_san_pham}}</h2>
                                        @endforeach

                                        <span>Số bánh bán được/ngày</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        @foreach ($doanhThuNgay as $value)
                                        <h2>{{$value->doanh_thu_ngay}}</h2>
                                        @endforeach

                                        <span>Doanh thu/Ngày</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        @foreach ($doanhThuThang as $value)
                                        <h2>{{$value->doanh_thu_thang}}</h2>
                                        @endforeach
                                        <span>Doanh thu/Tháng</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="title-1 m-b-25">SẢN PHẨM BÁN CHẠY</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Tên bánh</th>
                                        <th>Tổng số lượng bán được</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prods as $value)

                                    <tr>
                                        <td>{{$value->tenbanh}}</td>
                                        <td>{{$value->so_luong_ban_ra}}</td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title-1 m-b-25">KHÁCH HÀNG TIỀM NĂNG</h2>
                        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40" >
                            <div class="au-card-inner">
                                <div class="table-responsive" >
                                    <table class="table table-top-countries" >
                                        <thead >
                                            <tr>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng số hóa đơn</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accs as $value)

                                            <tr>
                                                <td>{{$value->tenkh}}</td>
                                                <td>{{$value->so_luong_hoa_don}}</td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
@endsection
