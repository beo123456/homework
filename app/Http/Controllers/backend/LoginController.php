<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    function GetLogin(){
        return view('Backend.login.login');
    }
    function PostLogin(LoginRequest $r){
        // dd($r->all());
        $email = $r->email;
        $password = $r->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('admin');
        }else{
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác')->withInput();
        }        
    }
}
