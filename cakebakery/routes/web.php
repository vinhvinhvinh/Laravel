<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',function(){
	return view('index');
});
Route::get('search',function(){
	return view('search');
});
Route::get('products',function(){
	return view('listproduct');
});
Route::get('cart',function(){
	return view('cart');
});
Route::get('checkout',function(){
	return view('checkout');
});
Route::get('product/detail',function(){
	return view('productdetail');
});

Route::get('dashboard', function () {
    return view('admin/index');
});
Route::get('dashboard/product', function () {
    return view('admin/product');
});
Route::get('login', function () {
    return view('auth/login');
});

