<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExcelTonVinh;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class KetQuaTonVinhController extends Controller
{
    public function XemKetQua(Request $request){
        $id = $request->id;
        $max = $request->max;
        $dv = $request->dv;
        $tenDV = DB::select('SELECT TenDonVi FROM donvi WHERE Id='.$dv)[0]->TenDonVi;

        $data = DB::select('SELECT DISTINCT *,exceltonvinh.Id as IdE FROM exceltonvinh,nguoihienmau WHERE MaDotTonVinh='.$id.' AND exceltonvinh.HoTen=nguoihienmau.HoTen AND exceltonvinh.NgaySinh=nguoihienmau.NgaySinh AND exceltonvinh.Nhom_ABO=nguoihienmau.Nhom_ABO');
        return view('KetQuaTonVinh')->with(['data'=>$data,'max'=>$max,'tenDV'=>$tenDV,'idTV'=>$id]);
    }
    public function XacNhan(Request $request){
        //lưu kết quả tôn vinh từ bảng exceltonvinh vào bảng người hiến máu
        //tham số đợt hiến máu
        $Id = $request->Id;
        $exceltonvinh = DB::table('exceltonvinh')->where('MaDotTonVinh',$Id)->get();
        $thoigianTV = DB::select('SELECT ThoiGian FROM tonvinh where Id='.$Id)[0]->ThoiGian;
        
        foreach($exceltonvinh as $item){
            if($item->MucTonVinh != 0)
                DB::table('nguoihienmau')->where('HoTen',$item->HoTen)->where('NgaySinh',$item->NgaySinh)->where('Nhom_ABO',$item->Nhom_ABO)->update(['Muc_'.$item->MucTonVinh => $thoigianTV, 'Muc_'.$item->MucTonVinh.'_donvi' => $item->MaDonVi]);
            
        } 
        
        return response('200')->setStatusCode(200);
    }
    public function XuatExcel(Request $request){
        //xuất ra file excel
        //tham số đợt hiến máu, mức tôn vinh lớn nhất

        $arr = array(5,10,15,20,30,40,50,60,70,80,90,100); 

        if(!isset($request->Id) || !isset($request->max)){
            return response('404')->setStatusCode(404);
        }
        $max = $request->max;
        $tonvinh = DB::select("SELECT YEAR(ThoiGian) as ThoiGian FROM tonvinh WHERE Id=".$request->Id)[0];
        $thoigian = strval($tonvinh->ThoiGian);
        $data = DB::select("SELECT * FROM nguoihienmau WHERE Muc_5 LIKE '%".$thoigian."%' OR Muc_10 LIKE '%".$thoigian."%' OR Muc_15 LIKE '%".$thoigian."%' OR Muc_20 LIKE '%".$thoigian."%' OR Muc_30 LIKE '%".$thoigian."%' OR Muc_40 LIKE '%".$thoigian."%' OR Muc_50 LIKE '%".$thoigian."%' OR Muc_60 LIKE '%".$thoigian."%' OR Muc_70 LIKE '%".$thoigian."%' OR Muc_80 LIKE '%".$thoigian."%' OR Muc_90 LIKE '%".$thoigian."%' OR Muc_100 LIKE '%".$thoigian."%' ");
        
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // add style to the header
            $styleArray1 = array(
            'font' => array(
                'name' => 'Times New Roman',
                'bold' => true,
                'size' => 11,
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('rgb' => '333333'),
                ),
            ),
            'fill' => array(
                'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array('rgb' => '0d0d0d'),
                'endColor'   => array('rgb' => 'f2f2f2'),
            ),
            );
            $styleArray2 = array(
                'font' => array(
                    'name' => 'Times New Roman',
                    'size' => 11,
                ),
            );
        // auto fit column to content
        foreach(range('A', 'I') as $columnID) {
            if($columnID != 'D')
                $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        // set the names of header cells
            $sheet->setCellValue('A1', 'STT');
            $sheet->setCellValue('B1', 'Họ và tên');
            $sheet->setCellValue('C1', 'Ngày sinh');
            $sheet->setCellValue('D1', 'Nơi làm việc');
            $sheet->setCellValue('E1', 'Số điện thoại');
            $sheet->setCellValue('F1', 'Địa chỉ');
            $sheet->setCellValue('G1', 'Số lần hiến');
            $sheet->setCellValue('H1', 'Nhóm máu');
            $sheet->setCellValue('I1', 'Nhóm Rh');
            //set dynamic column
            $x=0;
            $columnArr = array();
            foreach(range('J', 'Z') as $columnID) {
                    array_push($columnArr,$columnID);
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                    $sheet->setCellValue($columnID.'1', 'Mức '.$arr[$x]);
                    if($arr[$x] >= $max)
                        break;
                
                $x++;
            }

            //set style
            $spreadsheet->getActiveSheet()->getStyle('A1:'.$columnID.'1')->applyFromArray($styleArray1);

            //write data
            $x=2; $stt=1;
            foreach($data as $item){
                $sheet->setCellValue('A'.$x, $stt)->getStyle('A'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('B'.$x, $item->HoTen)->getStyle('B'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('C'.$x, date('d/m/Y',strtotime($item->NgaySinh)))->getStyle('C'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('D'.$x, $item->NoiLamViec)->getStyle('D'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('E'.$x, $item->SDT)->getStyle('E'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('F'.$x, $item->DiaChi)->getStyle('F'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('G'.$x, $item->SoLanHien)->getStyle('G'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('H'.$x, $item->Nhom_ABO)->getStyle('H'.$x)->applyFromArray($styleArray2);
                $sheet->setCellValue('I'.$x, $item->Nhom_Rh)->getStyle('H'.$x)->applyFromArray($styleArray2);
                for($i=0;$i<count($columnArr);$i++){
                    switch($arr[$i]){
                        case 5:
                            if($item->Muc_5 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 10:
                            if($item->Muc_10 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 15:
                            if($item->Muc_15 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 20:
                            if($item->Muc_20 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 30:
                            if($item->Muc_30 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 40:
                            if($item->Muc_40 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 50:
                            if($item->Muc_50 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 60:
                            if($item->Muc_60 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 70:
                            if($item->Muc_70 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 80:
                            if($item->Muc_80 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 90:
                            if($item->Muc_90 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        case 100:
                            if($item->Muc_100 != NULL)
                                $sheet->setCellValue($columnArr[$i].$x, 'x')->getStyle($columnArr[$i].$x)->applyFromArray($styleArray2);
                            break;
                        
                    }
                }

                $x++; $stt++;
            }

            $filename = 'Ket Qua Ton Vinh';
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');   
            }
}