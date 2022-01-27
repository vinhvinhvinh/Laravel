<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function account()
    {
        $account = Account::all();
        $accountCount = Account::all()->count();
        return view('admin.accounts.index', compact('account', 'accountCount'));
    }
    public function delete($id)
    {
        $account = Account::find($id)->delete();
        return back();
    }

    public function create()
    {

        $datetime = Date('Ymdhms');
        $countAllAccount = Account::all()->count() + 1;
        $chuoiID = $countAllAccount;
        if ($countAllAccount > 99)
            $chuoiID = $countAllAccount;

        if ($countAllAccount > 9)
            $chuoiID = '0' . $countAllAccount;
        else
            $chuoiID = '00' . $countAllAccount;

        $originalId = $chuoiID;
        $finalId = 'ACCOUNT' . $datetime . $originalId;
        return view('admin.accounts.create', compact('finalId'));
    }

    public function addAccount(Request $request)
    {
        // dd($request);
        $account = new Account();
        $account->id = $request->id;
        $account->tenkh = $request->tenkh;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $nameImg = $request->file('hinhanh')->getClientOriginalName();
        $account->hinhanh = $nameImg;
        $request->hinhanh->storeAs('admin/images', $nameImg);
        $account->diachi = $request->diachi;
        $account->email = $request->email;
        $account->loaitk = $request->loaitk;
        $account->trangthai = $request->trangthai;
        $account->save();
        return redirect()->route('admin.accounts.index');
    }

    public function edit($id)
    {
        $account = Account::find($id);
        return view('admin.accounts.edit', compact('account'));
    }

    function update(Request $request)
    {
        $account = Account::find($request->id);
        if ($request->hasFile('hinhanh')) {
            $newImg = $request->file('hinhanh')->getClientOriginalName();
            $request->hinhanh->storeAs('admin/images', $newImg);
            $recentImg = $newImg;
        }
        $recentPassword = Account::find($request->id)->password;
        $recentUsername = Account::find($request->id)->username;
        Account::where('id', $request->id)->update(
            [
                'id' => $request->id,
                'tenkh' => $request->tenkh,
                'username' => $recentUsername,
                'hinhanh' => ($recentImg == null) ? $request->oldImg : $request->hinhanh,
                'password' => $recentPassword,
                'diachi' => $request->diachi,
                'email' => $request->email,
                'loaitk' => $request->loaitk,
                'trangthai' => $request->trangthai,
            ]
        );

        return redirect()->route('admin.accounts.index');
    }
}