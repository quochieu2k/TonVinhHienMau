<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request){
        $request->validate([
            'username' => 'required|max:30|string',
            'password' => 'required|min:5',
        ]);
        $user = DB::table('users')->where('UserName', $request->username)->first();
        if(!$user){
            return view('Login')->with('message', 'Tài khoản bạn đã nhập không chính xác !');
        }
        if(!Hash::check($request->password, $user->Pass)) {
            return view('Login')->with('message', 'Sai mật khẩu !');
        }
        $request->session()->put('username', $request->username);
        $request->session()->put('name', $user->Name);
        return redirect('/Index');
    }
    
    
}