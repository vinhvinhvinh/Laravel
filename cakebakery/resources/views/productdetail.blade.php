@extends('layouts.master')
@extends('layouts.sidebar')
@section('title', 'Chi tiết sản phẩm')
@section('sidebar')
	@parent
@endsection
@section('content')
<!--================Product Details Area =================-->
<section class="product_details_area p_100">
    <div class="container">
        <div class="row product_d_price">
            <div class="col-lg-6">
                <div class="product_img"><img class="img-fluid" src="{{asset('img/cake-feature/'.$product->hinhanh)}}" alt=""></div>
            </div>
            <div class="col-lg-6">
                <div class="product_details_text">

                    <h4>{{$product->tenbanh}}</h4>
                    <p>{{$product->mota}}</p>
                    <h5>Gía :<span>{{$product->giaban}}</span></h5>
                    <div class="quantity_box">
                        <label for="quantity">Số lượng :</label>
                        <input type="text" placeholder="1" id="quantity">
                    </div>
                    <a class="pink_more" href="#">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="product_tab_area">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Specification</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review (0)</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p>{{$product->mota}}</p>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Details Area =================-->
 <!--================Similar Product Area =================-->
 <section class="similar_product_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Sản phẩm đề xuất</h2>
        </div>
        <div class="row similar_product_inner">
            @foreach ($sanPhamLienQuan as $item)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="cake_feature_item">
                    <div class="cake_img">
                        <img src="{{asset('img/cake-feature/'.$item->hinhanh)}}" alt="{{$item->id}}">
                    </div>
                    <div class="cake_text">
                        <h4>{{$item->giaban}}</h4>
                        <h3>{{$item->tenbanh}}</h3>
                        <a class="pest_btn" href="#">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--================End Similar Product Area =================-->
@endsection

