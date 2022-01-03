<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AccountController;
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
Route::get('index', function () {
	return view('index');
});
Route::get('search', function () {
	return view('search');
});
Route::get('products', function () {
	return view('listproduct');
});
Route::get('cart', function () {
	return view('cart');
});
Route::get('checkout', function () {
	return view('checkout');
});
Route::get('product/detail', function () {
	return view('productdetail');
});

Route::get('dashboard', function () {
	return view('admin/index');
});
Route::get('dashboard/product', function () {
	return view('admin/products/product');
});
Route::get('login', function () {
	return view('auth/login');
});

Route::group(['prefix' => 'product'], function () {
	Route::get('/', [ProductController::class, 'product'])->name('admin.products.index');
	Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
	Route::post('/create', [ProductController::class, 'addProduct'])->name('admin.products.addProduct');
	Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
	Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
	Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');
	Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
});

Route::group(['prefix' => 'invoice'], function () {
	Route::get('/', [InvoiceController::class, 'invoice'])->name('admin.invoices.index');
	Route::get('/create', [InvoiceController::class, 'create'])->name('admin.invoices.create');
	Route::post('/create', [InvoiceController::class, 'addInvoice'])->name('admin.invoices.addInvoice');
	Route::post('/store', [InvoiceController::class, 'store'])->name('admin.invoices.store');
	Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoices.edit');
	Route::post('/update', [InvoiceController::class, 'update'])->name('admin.invoices.update');
	Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('admin.invoices.delete');
});
Route::group(['prefix' => 'employee'], function () {
	Route::get('/', [EmployeeController::class, 'employee'])->name('admin.employees.index');
	Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
	Route::post('/create', [EmployeeController::class, 'addEmployee'])->name('admin.employees.addEmployee');
	Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
	Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
	Route::post('/update', [EmployeeController::class, 'update'])->name('admin.employees.update');
	Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('admin.employees.delete');
});
Route::group(['prefix' => 'account'], function () {
	Route::get('/', [AccountController::class, 'account'])->name('admin.accounts.index');
	Route::get('/create', [AccountController::class, 'create'])->name('admin.accounts.create');
	Route::post('/create', [AccountController::class, 'addAccount'])->name('admin.accounts.addAccount');
	Route::post('/store', [AccountController::class, 'store'])->name('admin.accounts.store');
	Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('admin.accounts.edit');
	Route::post('/update', [AccountController::class, 'update'])->name('admin.accounts.update');
	Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('admin.accounts.delete');
});
