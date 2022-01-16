<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\BaseController;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function product()
    {
        $product = Product::all();
        $productCount = Product::all()->count();
        //dd($product);
        return view('admin.products.product', compact('product', 'productCount'));
    }


    public function delete($id)
    {
        $product = Product::find($id)->delete();
        return back();
    }

    public function create()
    {

        $datetime = Date('Ymdhms');
        $countAllProd = Product::all()->count() + 1;
        $chuoiID = $countAllProd;
        if ($countAllProd > 99)
            $chuoiID = $countAllProd;

        if ($countAllProd > 9)
            $chuoiID = '0' . $countAllProd;
        else
            $chuoiID = '00' . $countAllProd;

        $originalId = $chuoiID;
        $finalId = 'CAKE' . $datetime . $originalId;
        return view('admin.products.create', compact('finalId'));
    }

    public function addProduct(Request $request)
    {
        // dd($request);
        $product = new Product();
        $product->id = $request->id;
        $product->tenbanh = $request->tenbanh;
        $product->mota = $request->mota;
        $product->giaban = $request->giaban;
        //$product->hinhanh = $request->hinhanh;

        $nameImg = $request->file('hinhanh')->getClientOriginalName();
        $product->hinhanh = $nameImg;
        $product->tinhtrang = 1;
        $request->hinhanh->storeAs('img/cake-feature', $nameImg);
        $product->save();
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    function update(Request $request)
    {
        $product = Product::find($request->id);
        $recentImg = $product->hinhanh;
        if ($request->hasFile('hinhanh')) {
            $newImg = $request->file('hinhanh')->getClientOriginalName();
            $request->hinhanh->storeAs('img/cake-feature', $newImg);
            $recentImg = $newImg;
        }

        Product::where('id', $request->id)->update(
            [
                'id' => $request->id,
                'tenbanh' => $request->tenbanh,
                'mota' => $request->mota,
                'giaban' => $request->giaban,
                'hinhanh' => $recentImg,
            ]
        );

        return redirect()->route('admin.products.index');
    }
    public function dashboard(){
        //Sản phẩm bán chạy
        $prods =  DB::select('select products.*, SUM(invoice_details.soluong) as so_luong_ban_ra from products, invoice_details
        where products.id=invoice_details.mabanh
        group by products.id
        order by SUM(invoice_details.soluong) desc LIMIT 5');

        //Số bánh tiêu thụ được trong 1 ngày
        $soBanhTieuThuTrongNgay=DB::select('select SUM(invoice_details.soluong) as tong_san_pham
        from invoice_details, invoices
        WHERE invoice_details.mahd=invoices.id and ngaylaphd=DATE(NOW()) and MONTH(ngaylaphd)=MONTH(NOW()) and YEAR(ngaylaphd)=YEAR(NOW())
        ');

        //Số hóa đơn bán trong ngày
        $soHoaDonBanTrongNgay=DB::select('select COUNT(invoices.id) as tong_hoa_don
        from invoices
        WHERE ngaylaphd=DATE(NOW()) and MONTH(ngaylaphd)=MONTH(NOW()) and YEAR(ngaylaphd)=YEAR(NOW())');

        //Khách hàng tiềm năng
        $accs =  DB::select('select accounts.*, COUNT(invoices.id) as so_luong_hoa_don from accounts, invoices
        where accounts.id=invoices.matk
        group by accounts.id
        order by COUNT(invoices.id) desc LIMIT 5');


        //Doanh thu trong ngay
        $doanhThuNgay=DB::select('select SUM(invoices.tongtien) as doanh_thu_ngay
                                from invoices
                                WHERE ngaylaphd=DATE(NOW()) and MONTH(ngaylaphd)=MONTH(NOW()) and YEAR(ngaylaphd)=YEAR(NOW())');

        $doanhThuThang=DB::select('select SUM(invoices.tongtien) as doanh_thu_thang
        from invoices
        WHERE MONTH(ngaylaphd)=MONTH(NOW()) and YEAR(ngaylaphd)=YEAR(NOW())');

         return view('admin.index',compact('prods','accs','doanhThuNgay','doanhThuThang','soBanhTieuThuTrongNgay','soHoaDonBanTrongNgay'));
    }
}
