<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller
{

    //
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $getFormInfor = $request->only('username', 'password');
        if (Auth::attempt($getFormInfor)) {

            #chỗ này của user
            $user = Auth::user();
            $nameOfUser = $user->tenkh;
            $imgOfUser = $user->hinhanh;


            if ($user->loaitk == -1) {
                return redirect()->route('admin.products.index')->with('nameOfUser', $nameOfUser)->with('imgOfUser', $imgOfUser);
            } else {
                echo 'Trang chủ người dùng';
            }
        }
    }

    #Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        //Kiểm tra mail
        $checkEmail = Account::where('email', $request->email)->first();

        if (empty($checkEmail)) {
            //Tạo ID
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
            //Tạo account
            $account = new Account();
            $account->id = $finalId;
            $account->tenkh = $request->tenkh;
            $account->username = $request->username;
            $account->password = Hash::make($request->password);
            $nameImg = $request->file('hinhanh')->getClientOriginalName();
            $account->hinhanh = $nameImg;
            $request->hinhanh->storeAs('admin/images', $nameImg);
            $account->diachi = $request->diachi;
            $account->email = $request->email;
            $account->loaitk = -1;
            $account->trangthai = 1;
            $account->save();
            return redirect()->route('auth.login');
        }
        return back()->with('error', 'Email đã đăng kí');
    }
}
