<?php

namespace App\Http\Controllers;

use App\Models\NguoiHienMau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use phpDocumentor\Reflection\Location;

class TimKiemController extends Controller
{
  public function index()
  {
    $nguoihienmau = DB::select('SELECT * FROM nguoihienmau');
    return view('TimKiemTonVinh', compact('nguoihienmau'));
  }
  public function search(Request $request)
  {
    $chuoilon = explode('-', '0-100');
    if (isset($request->solanhienmau)) {
      $chuoilon = explode('-', $request->solanhienmau);
    }
    $nguoihienmau = DB::table('nguoihienmau')
      ->where('HoTen', 'LIKE', '%' . $request->name . '%')
      ->where('DiaChi', 'LIKE', '%' . $request->diachi . '%')
      ->where('Nhom_ABO', 'LIKE', $request->nhommau)
      ->whereBetween('SoLanHien', [(int)$chuoilon[0], (int)$chuoilon[1]])
      ->get();

    $i=0;
    $count = count($nguoihienmau);

    if($request->trangthai == 'chuatonvinh'){

      if(isset($request->muctonvinh)){
        while($i<$count){
          switch($request->muctonvinh){
            case "5":
              if($nguoihienmau[$i]->Muc_5 != NULL)
                unset($nguoihienmau[$i]);
              break;
            case "10":
              if($nguoihienmau[$i]->Muc_10 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "15":
              if($nguoihienmau[$i]->Muc_15 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "20":
              if($nguoihienmau[$i]->Muc_20 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "30":
              if($nguoihienmau[$i]->Muc_30 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "40":
              if($nguoihienmau[$i]->Muc_40 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "50":
              if($nguoihienmau[$i]->Muc_50 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "60":
              if($nguoihienmau[$i]->Muc_60 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "70":
              if($nguoihienmau[$i]->Muc_70 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "80":
              if($nguoihienmau[$i]->Muc_80 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "90":
              if($nguoihienmau[$i]->Muc_90 != NULL)
                unset($nguoihienmau[$i]);
                break;
            case "100":
              if($nguoihienmau[$i]->Muc_100 != NULL)
                unset($nguoihienmau[$i]);
                break;
          }
          $i++;
        }
      }

    }else{
    
      
      if(isset($request->muctonvinh)){
        while($i<$count){
          switch($request->muctonvinh){
            case "5":
              if($nguoihienmau[$i]->Muc_5 == NULL)
                unset($nguoihienmau[$i]);
              break;
            case "10":
              if($nguoihienmau[$i]->Muc_10 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "15":
              if($nguoihienmau[$i]->Muc_15 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "20":
              if($nguoihienmau[$i]->Muc_20 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "30":
              if($nguoihienmau[$i]->Muc_30 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "40":
              if($nguoihienmau[$i]->Muc_40 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "50":
              if($nguoihienmau[$i]->Muc_50 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "60":
              if($nguoihienmau[$i]->Muc_60 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "70":
              if($nguoihienmau[$i]->Muc_70 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "80":
              if($nguoihienmau[$i]->Muc_80 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "90":
              if($nguoihienmau[$i]->Muc_90 == NULL)
                unset($nguoihienmau[$i]);
                break;
            case "100":
              if($nguoihienmau[$i]->Muc_100 == NULL)
                unset($nguoihienmau[$i]);
                break;
          }
          $i++;
        }
      }
    }
    //dd($nguoihienmau);
    return view('TimKiemTonVinh', compact('nguoihienmau'));
  }

  public function edit($Id)
  {
    $nguoihienmau = DB::table('nguoihienmau')->find($Id);
    return view('CapNhatThongTin', ['pep' => $nguoihienmau]);
  }

  public function update(Request $request, $Id)
  {
    $nguoihienmau = DB::table('nguoihienmau')->find($Id);
    $nguoihienmau->HoTen = $request->hoten;
    $nguoihienmau->NgaySinh = $request->ngaysinh;
    $nguoihienmau->NoiLamViec = $request->noilamviec;
    $nguoihienmau->SDT = $request->sdt;
    $nguoihienmau->DiaChi = $request->diachi;
    $nguoihienmau = DB::update('update nguoihienmau set HoTen = ?, NgaySinh = ?, NoiLamViec = ?, SDT = ?, DiaChi = ? where Id = ?', [$request->hoten, $request->ngaysinh, $request->noilamviec, $request->sdt, $request->diachi, $Id]);
    return redirect('/TimKiemTonVinh');
  }
}
