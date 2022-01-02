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
        //dd($product);
        return view('admin.product', compact('product'));
    }

    public function delete($id)
    {
        $product = Product::find($id)->delete();
        return back();
    }
}