<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuDetail;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;



class MenuDetailController extends Controller
{
    //
    public function menudetail($id)
    {

        $menuDetails = MenuDetail::join('products', 'menu_details.mabanh', '=', 'products.id')->select('menu_details.*', 'products.tenbanh')->where('mamenu', $id)->get();
        // dd($menuDetails);
        return view('admin.menudetails.menudetail', compact('menuDetails'));
    }

    public function delete($id)
    {
        $menu = MenuDetail::find($id)->delete();
        return back();
    }
}