<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Menu;
use App\Models\MenuDetail;
use Illuminate\Support\MessageBag;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    //


    public function addToCart($prodId)
    {

        //Kiểm tra số lượng trong ngày của chiếc bánh $prodId
        $menuToday = Menu::where('ngaylap', Date('Ymd'))->first();
        $menuTodayId = $menuToday->id;
        $menuDetailToday = MenuDetail::where('mamenu', $menuTodayId)->where('mabanh', $prodId)->first();
        $quantityToday = $menuDetailToday->soluong;
        // dd($quantityToday);


        $cart = Session::get('cart');
        $products = DB::table('products')->where('id', $prodId)->first();
        $productSoldOutName = $products->tenbanh;


        if ($quantityToday != 0) {

            if (!isset($cart[$products->id])) {
                $cart[$products->id] = array(
                    "id" => $products->id,
                    "name" => $products->tenbanh,
                    "img" => $products->hinhanh,
                    "price" => $products->giaban,
                    "quantity" => 1,
                );
                Session::put('cart', $cart);
                Session::flash('success', 'thêm thành công!');
            } else {
                $cart[$products->id]['quantity'] += 1;
                Session::put('cart', $cart);
            }


            //dd(Session::get('cart'));
            return redirect()->back();
        } else {

            Alert::warning('Xin lỗi bạn', 'Bánh ' . $productSoldOutName . ' đã bán hết. Quay lại sau nha');
            return redirect()->back();
        }
    }

    public function cart()
    {
        $totalCart = 0;
        $cart = Session::get('cart');
        if ($cart != null) {
            foreach ($cart as $item) {
                $totalCart += $item['price'] * $item['quantity'];
            }
            return view('cart', compact('cart', 'totalCart'));
        }
        return view('cart', compact('cart', 'totalCart'));
    }

    public function pay()
    {
        //Lấy Cart
        $cart = Session::get('cart');

        //Thêm hóa đơn
        $employee = 'EMPLOYEE20220103060123002';
        $datetime = Date('Ymdhms');
        $countAllInv = Invoice::all()->count() + 1;
        $chuoiID = $countAllInv;
        if ($countAllInv > 99)
            $chuoiID = $countAllInv;

        if ($countAllInv > 9)
            $chuoiID = '0' . $countAllInv;
        else
            $chuoiID = '00' . $countAllInv;

        $originalId = $chuoiID;
        $finalInvId = 'INV' . $datetime . $originalId;

        $inv = new Invoice();
        $inv->id = $finalInvId;
        $inv->matk = Session::get('userId');
        $inv->ngaylaphd = Date('Ymd');
        $inv->nvlap = $employee;

        //Total
        $totalCart = 0;
        foreach ($cart as $item) {
            $totalCart += $item['price'] * $item['quantity'];
        }

        $inv->tongtien = $totalCart;
        $inv->save();
        //Lấy thông tin thực đơn ngày hôm nay

        $menuToday = Menu::where('ngaylap', Date('Ymd'))->first();
        $menuTodayId = $menuToday->id;



        foreach ($cart as $item) {
            $menuDetailForUpdateStock = MenuDetail::where('mamenu', $menuTodayId)->where('mabanh', $item['id'])->first();

            $invDt = new InvoiceDetail();
            $invDt->mahd = $finalInvId;
            $invDt->mabanh = $item['id'];
            $invDt->soluong = $item['quantity'];
            $invDt->dongia = $item['price'];

            // sửa số lượng trong menu detail
            $menuDetailForUpdateStock->soluong -= $item['quantity'];
            $invDt->save();
            $menuDetailForUpdateStock->save();
        }

        //REMOVE ALL CART
        session()->forget('cart');

        Alert::success('Chúc mừng', 'Thanh toán thành công. Hẹn gặp lại bạn');
        return redirect()->route('index');
    }

    public function deleteAll()
    {
        $cart = Session::get('cart');
        session()->forget('cart');
        return redirect()->back();
    }

    public function delete($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back();
    }
}
