<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $new_password = Str::random(15);

        DB::table('users')->where('Email',$request->email)->update(['Pass'=>Hash::make($new_password)]);
        

        Mail::send('emailTemplate',['new_password' => $new_password], function($message) use ($request) {
                  $message->to($request->email);
                  $message->subject('Thông Báo Reset Mật Khẩu');
               });

        return back()->with('message', 'We have e-mailed your reseted password!');
    }
}