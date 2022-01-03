<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


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
}