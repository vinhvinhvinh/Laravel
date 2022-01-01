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
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="{{asset('img/product/cart-img.jpg')}}" alt="">
								</td>
								<td>Wheel Axel</td>
								<td>$25.00</td>
								<td>
										<option data-display="1">1</option>

								</td>
								<td>$25.00</td>
								<td>X</td>
							</tr>
							<tr>
								<td>
									<form class="form-inline">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Coupon code">
										</div>
										<button type="submit" class="btn">Apply Coupon</button>
									</form>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<a class="pest_btn" href="#">Add To Cart</a>
								</td>
							</tr>
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
        						<h5>Sub Total <span>$25.00</span></h5>
        					</div>
        					<div class="total">
        						<h4>Total <span>$25.00</span></h4>
        					</div>
        					<div class="cart_footer">
        						<a class="pest_btn" href="#">Proceed to Checkout</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->

@endsection

