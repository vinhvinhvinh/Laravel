<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //

    public function menu()
    {
        $menu =  Menu::orderBy('id', 'DESC')->get();;
        $menuCount = Menu::all()->count();
        //dd($menu);
        return view('admin.menus.menu', compact('menu', 'menuCount'));
    }

    public function delete($id)
    {
        $menu = Menu::find($id)->delete();
        return back();
    }

    public function create()
    {
        $employees = Account::where('loaitk',0)->get();

        $datetime = Date('Ymdhms');
        $countAllMenu = Menu::all()->count() + 1;
        $chuoiID = $countAllMenu;
        if ($countAllMenu > 99)
            $chuoiID = $countAllMenu;

        if ($countAllMenu > 9)
            $chuoiID = '0' . $countAllMenu;
        else
            $chuoiID = '00' . $countAllMenu;

        $originalId = $chuoiID;
        $finalId = 'MENU' . $datetime . $originalId;
        return view('admin.menus.create', compact('finalId', 'employees'));
    }

    public function addMenu(Request $request)
    {
        // dd($request);
        $menu = new Menu();
        $menu->id = $request->id;
        $menu->ngaylap = $request->ngaylap;
        $menu->nvlap = Auth::user()->id;
        $menu->trangthai = 1;
        $menu->save();
        return redirect()->route('admin.menus.index');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menus.edit', compact('menu'));
    }

    function update(Request $request)
    {
        $menu = Menu::find($request->id);
        Menu::where('id', $request->id)->update(
            [

                'trangthai' => $request->trangthai,
            ]
        );

        return redirect()->route('admin.menus.index');
    }
}
