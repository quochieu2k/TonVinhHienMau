<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:5',
            'new_password' => 'required|min:5|same:new_password',
            'password_confirmation' => 'required|min:5|same:new_password',

        ]);

        $user = DB::table('users')->where('UserName', $request->session()->get('username'))->first();

        if(!$user){
            return redirect('/Login');
        }

        if (!(Hash::check($request->password, $user->Pass ))) {
            // The passwords matches
            return redirect()->back()->with("message","Your current password does not matches. Please try again.");
        }

        DB::table('users')->where('UserName',$user->UserName)->update(['Pass'=>Hash::make($request->new_password)]);
        return back()->with('message', 'Bạn đã thay đổi mật khẩu thành công!');

        
    }
}