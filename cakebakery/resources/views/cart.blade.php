@extends('layouts.master')
@extends('layouts.sidebar')
@section('title', 'Giỏ hàng')
@section('sidebar')
	@parent
@endsection
@section('content')
		
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Preview</th>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col"><a href="{{route('home.cart.deleteAll')}}">Xóa giỏ hàng</a></th>
							</tr>
						</thead>
						<tbody>
							
							@if($cart!=null)
							@foreach($cart as $item)
							<tr>
								<td>
									<img width=100 height=100 src="{{asset('img/cake-feature/'.$item['img'])}}" alt="">
								</td>
								<td>{{$item['name']}}</td>
								<td>{{$item['price']}}</td>
								<td>
										<option data-display="1">{{$item['quantity']}}</option>

								</td>
								<td>{{$item['price']*$item['quantity']}}</td>
								<td><a href="{{route('home.cart.delete',['prodId'=>$item['id']])}}">X</a></td>
							</tr>
							@endforeach
							@else
								<h2 style="text-align:center">Giỏ hàng trống</h2>
							@endif
						</tbody>
					</table>
				</div>
       			<div class="row cart_total_inner">
        			<div class="col-lg-7"></div>
        			<div class="col-lg-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total
        					</div>
        					<div class="sub_total">
        						<h5>Phụ thu <span>0 VND</span></h5>
        					</div>
        					<div class="total">
        						<h4>Tổng <span>{{$totalCart}} VND</span></h4>
        					</div>
        					<div class="cart_footer">
        						<a class="pest_btn" href="{{route('home.cart.pay')}}">Thanh Toán</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->

@endsection

