<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

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
}