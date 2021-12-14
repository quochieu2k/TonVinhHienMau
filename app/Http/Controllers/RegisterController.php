<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|max:255|string',
      'email' => 'required|email|string',
      'phone' => 'required|min:10|string',
      'username' => 'required|max:30|string',
      'password' => 'required|min:5|same:password',
      'password_confirm' => 'required|min:5|same:password',
    ]);
    $user = DB::table('users')->where('UserName', $request->username)->first();
    if (!$user) {
      $newUser = new User();
      $newUser->Name = $request->name;
      $newUser->Email = $request->email;
      $newUser->Phone = $request->phone;
      $newUser->UserName = $request->username;
      $newUser->Pass = Hash::make($request->password);
      $newUser->save();
      return redirect('TaoTaiKhoan')->with('message', 'Bạn đã tạo tài khoản thành công');
    } else {
      return redirect('TaoTaiKhoan')->with('message', 'Tài khoản đã tồn tại, mời đăng nhập');
    }
  }
}
