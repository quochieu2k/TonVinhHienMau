<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TonVinh;
Use Exception;

class LichSuTonVinhController extends Controller
{
    public function TaoMoiTonVinh(Request $request){
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }

        $dsTonVinh = DB::select("select Id,MONTH(ThoiGian) as month,YEAR(ThoiGian) as year from tonvinh");
        return view('TaoMoiTonVinh')->with('list',$dsTonVinh);
    }

    public function TaoMoiTonVinhPost(Request $request){
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }
        $request->validate([
            'thoi-gian' => 'required|date_format:Y-m',
        ]);

        $time = $request->input('thoi-gian');

        $tonvinh = new TonVinh();
        $tonvinh->ThoiGian = $time."-01";
        $tonvinh->save();

        return back();

    }

    public function XoaDotTonVinh(Request $request){
        $id = $request->input('id');
        TonVinh::find($id)->delete();
        return back();
    }

    public function XemKetQua(Request $request){
        //$tonvinh = TonVinh::selectRaw('YEAR(ThoiGian)')->orderBy('ThoiGian','DESC')->first();
        $tonvinh = DB::select("SELECT YEAR(ThoiGian) as ThoiGian FROM tonvinh ORDER BY ThoiGian DESC");
        if(!$tonvinh){
            return view('XemKetQuaTonVinhNull');
        }
        $thoigian = strval($tonvinh[0]->ThoiGian);
        $data = DB::select("SELECT * FROM nguoihienmau WHERE Muc_5 LIKE '%".$thoigian."%' OR Muc_10 LIKE '%".$thoigian."%' OR Muc_15 LIKE '%".$thoigian."%' OR Muc_20 LIKE '%".$thoigian."%' OR Muc_30 LIKE '%".$thoigian."%' OR Muc_40 LIKE '%".$thoigian."%' OR Muc_50 LIKE '%".$thoigian."%' OR Muc_60 LIKE '%".$thoigian."%' OR Muc_70 LIKE '%".$thoigian."%' OR Muc_80 LIKE '%".$thoigian."%' OR Muc_90 LIKE '%".$thoigian."%' OR Muc_100 LIKE '%".$thoigian."%' ");
        
        return view('XemKetQuaTonVinh')->with(['year'=>$thoigian,'data'=>$data]);
    }
    
    public function XemKetQuaPost(Request $request){
        $thoigian = $request->time;
        $data = DB::select("SELECT * FROM nguoihienmau WHERE Muc_5 LIKE '%".$thoigian."%' OR Muc_10 LIKE '%".$thoigian."%' OR Muc_15 LIKE '%".$thoigian."%' OR Muc_20 LIKE '%".$thoigian."%' OR Muc_30 LIKE '%".$thoigian."%' OR Muc_40 LIKE '%".$thoigian."%' OR Muc_50 LIKE '%".$thoigian."%' OR Muc_60 LIKE '%".$thoigian."%' OR Muc_70 LIKE '%".$thoigian."%' OR Muc_80 LIKE '%".$thoigian."%' OR Muc_90 LIKE '%".$thoigian."%' OR Muc_100 LIKE '%".$thoigian."%' ");
        
        return view('XemKetQuaTonVinh')->with(['year'=>$thoigian,'data'=>$data]);
    }
}
