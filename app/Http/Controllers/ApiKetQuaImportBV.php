<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExcelBenhVien;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class ApiKetQuaImportBV extends Controller
{
    public function Import(Request $request){
        if(!isset($request['Id'])){
            return response('404')->setStatusCode(404);
        }

        $data = DB::select('SELECT DISTINCT HoTen,NgaySinh,NgheNghiep,NoiLamViec,SDT,DiaChi,SoLanHien,Nhom_ABO,Nhom_Rh FROM excelbenhvien WHERE Id=? AND Xoa=0',[$request['Id']]);
        
        if($data==null){
            return response('404')->setStatusCode(404);
        }

        $status = DB::insert('INSERT INTO nguoihienmau(HoTen,NgaySinh,NgheNghiep,NoiLamViec,SDT,DiaChi,SoLanHien,Nhom_ABO,Nhom_Rh,Nguon_Goc_Import)
        VALUES(?,?,?,?,?,?,?,?,?,?)',[$data[0]->HoTen,$data[0]->NgaySinh,$data[0]->NgheNghiep,$data[0]->NoiLamViec,$data[0]->SDT,$data[0]->DiaChi,$data[0]->SoLanHien,$data[0]->Nhom_ABO,$data[0]->Nhom_Rh,0]);
        return response('200')->setStatusCode(200);
    }

    public function Xoa(Request $request){
        if(!isset($request['Id'])){
            return response('404')->setStatusCode(404);
        }

        $status = DB::update('UPDATE nguoihienmau SET Xoa=1 WHERE Id=?',[$request['Id']]);
        
        if($status>0){
            return response('200')->setStatusCode(200);
        }
        return response('404')->setStatusCode(404);
    }
    
    
}