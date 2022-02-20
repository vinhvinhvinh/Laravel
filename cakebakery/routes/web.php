<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuDetailController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/index', [ProductController::class, 'home'])->name('index');
Route::get('/product/{id}', [ProductController::class, 'productDetail'])->name('productDetail');
Route::get('search', function () {
	return view('search');
});
Route::get('products', function () {
	return view('listproduct');
});

Route::get('checkout', function () {
	return view('checkout');
});
Route::get('profile', function () {
	return view('profile');
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

####################### ----- Đăng nhập/ Đăng xuất
#Login Route
Route::get('/', [AuthenticationController::class, 'loginForm'])->name('login');
# Xử lý Login
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/signup', [AuthenticationController::class, 'signupForm'])->name('signup');
Route::post('/signup', [AuthenticationController::class, 'signup'])->name('auth.signup');
Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['prefix' => 'cart', 'middleware' => ['auth']], function () {
	Route::get('/', [CartController::class, 'cart'])->name('home.cart');
	Route::get('/addToCart/{prodId}', [CartController::class, 'addToCart'])->name('home.addtocart');
	Route::get('/delete/{prodId}', [CartController::class, 'delete'])->name('home.cart.delete');
	Route::get('/deleteAll', [CartController::class, 'deleteAll'])->name('home.cart.deleteAll');
	Route::get('/pay', [CartController::class, 'pay'])->name('home.cart.pay');
});

Route::group(['prefix' => 'product', 'middleware' => ['auth']], function () {
	Route::get('/', [ProductController::class, 'product'])->name('admin.products.index');

	Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
	Route::post('/create', [ProductController::class, 'addProduct'])->name('admin.products.addProduct');
	Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
	Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
	Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');
	Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
});

Route::group(['prefix' => 'invoice', 'middleware' => ['auth']], function () {
	Route::get('/', [InvoiceController::class, 'invoice'])->name('admin.invoices.index');
    Route::get('/duyetHD/{id}', [InvoiceController::class, 'duyetHD'])->name('duyetHD');
	Route::get('/create', [InvoiceController::class, 'create'])->name('admin.invoices.create');
	Route::post('/create', [InvoiceController::class, 'addInvoice'])->name('admin.invoices.addInvoice');
	Route::post('/store', [InvoiceController::class, 'store'])->name('admin.invoices.store');
	Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoices.edit');
	Route::get('/detail/{id}', [InvoiceController::class, 'findInvoiceDetailByInvoiceId'])->name('admin.invoices.detail');
	Route::post('/update', [InvoiceController::class, 'update'])->name('admin.invoices.update');
	Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('admin.invoices.delete');
});
Route::group(['prefix' => 'employee', 'middleware' => ['auth']], function () {
	Route::get('/', [EmployeeController::class, 'employee'])->name('admin.employees.index');
	Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
	Route::post('/create', [EmployeeController::class, 'addEmployee'])->name('admin.employees.addEmployee');
	Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
	Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
	Route::post('/update', [EmployeeController::class, 'update'])->name('admin.employees.update');
	Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('admin.employees.delete');
});
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function () {
	Route::get('/', [AccountController::class, 'account'])->name('admin.accounts.index');
	Route::get('/create', [AccountController::class, 'create'])->name('admin.accounts.create');
	Route::post('/create', [AccountController::class, 'addAccount'])->name('admin.accounts.addAccount');
	Route::post('/store', [AccountController::class, 'store'])->name('admin.accounts.store');
	Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('admin.accounts.edit');
	Route::post('/update', [AccountController::class, 'update'])->name('admin.accounts.update');
	Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('admin.accounts.delete');
    Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
	Route::post('/updateProfile', [AccountController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/profileAdmin', [AccountController::class, 'profileAdmin'])->name('profileAdmin');
	Route::post('/updateProfileAdmin', [AccountController::class, 'updateProfile'])->name('updateProfileAdmin');
    Route::get('/invoices/{mahd}', [AccountController::class, 'chiTietDonHang'])->name('detailinvoices');
    Route::get('/vohieuhoa/{id}', [AccountController::class, 'voHieuHoa'])->name('voHieuHoa');
});

Route::group(['prefix' => 'menu', 'middleware' => ['auth']], function () {
	Route::get('/', [MenuController::class, 'menu'])->name('admin.menus.index');
	Route::get('/create', [MenuController::class, 'create'])->name('admin.menus.create');
	Route::post('/create', [MenuController::class, 'addMenu'])->name('admin.menus.addMenu');
	// Route::post('/store', [AccountController::class, 'store'])->name('admin.accounts.store');
	Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('admin.menus.edit');
	Route::post('/update', [MenuController::class, 'update'])->name('admin.menus.update');
	Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('admin.menus.delete');
});

Route::group(['prefix' => 'menudetail', 'middleware' => ['auth']], function () {
	//Route::get('/', [MenuDetailController::class, 'menudetail'])->name('admin.menudetails.index');
	Route::get('/detail/{id}', [MenuDetailController::class, 'menudetail'])->name('admin.menudetails.index');
	Route::get('/create/{id}', [MenuDetailController::class, 'create'])->name('admin.menudetails.create');
	Route::post('/create', [MenuDetailController::class, 'addMenuDetail'])->name('admin.menudetails.addMenuDetail');
	Route::get('/edit/{id}', [MenuDetailController::class, 'edit'])->name('admin.menudetails.edit');
	Route::post('/update', [MenuDetailController::class, 'update'])->name('admin.menudetails.update');
	Route::get('/delete/{id}', [MenuDetailController::class, 'delete'])->name('admin.menudetails.delete');
});
