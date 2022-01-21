<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuDetail;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class MenuDetailController extends Controller
{
    //
    public function menudetail($id)
    {
        $recentMenu = $id;
        $menuDetails = MenuDetail::join('products', 'menu_details.mabanh', '=', 'products.id')->select('menu_details.*', 'products.tenbanh')->where('mamenu', $id)->get();
        // dd($menuDetails);
        return view('admin.menudetails.menudetail', compact('menuDetails', 'recentMenu'));
    }

    public function delete($id)
    {
        $menu = MenuDetail::find($id)->delete();
        return back();
    }
    public function create($id)
    {
        $recentMenu = $id;
        //$thismenu = $recentMenu;
        $products = Product::all();
        return view('admin.menudetails.create', compact('products', 'recentMenu'));
    }

    public function addMenuDetail(Request $request)
    {
        // dd($request);
        $menudt = new MenuDetail();

        $menudt->mamenu = $request->mamenu;
        $menudt->mabanh = $request->mabanh;
        $menudt->soluong = $request->soluong;
        $menudt->save();
        //return redirect('menudetail/detail/' . $request->mamenu);
        return redirect()->route('admin.menudetails.index', ['id' => $request->mamenu]);
    }
    public function edit($id)
    {
        $products = Product::all();
        $menu = MenuDetail::find($id);
        return view('admin.menudetails.edit', compact('menu', 'products'));
    }

    function update(Request $request)
    {

        MenuDetail::where('id', $request->id)->update(
            [

                'mabanh' => $request->mabanh,
                'soluong' => $request->soluong,
            ]
        );

        return redirect()->route('admin.menudetails.index', ['id' => $request->mamenu]);
    }
}