<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuaXoaTTController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('SuaXoaThongTin', ['users' => $users]);
    }

    public function edit($Id)
    {
        $users = User::find($Id);
        return view('SuaThongTin', ['user' => $users]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|string',
            'phone' => 'required|min:10|string',
            'username' => 'required|max:30|string',
          ]);

        $users = User::find($request->Id);
        $users->Name = $request->name;
        $users->Email = $request->email;
        $users->Phone = $request->phone;
        $users->UserName = $request->username;
        $users->save();
        return redirect('/UpdateTaiKhoan');
    }

    public function destroy($Id)
    {
        $users = User::where('Id', $Id)->delete();
        return redirect('/UpdateTaiKhoan');
    }
}
