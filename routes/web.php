<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/Index');
});

Route::get('/Index', function (Request $request) {
    if($request->session()->has('username')){
        return view('Index');
    }
    return redirect('/Login');
});

Route::get('/Login', function (Request $request) {
    if($request->session()->has('username')){
        return redirect('/Index');
    }
    return view('Login');
});
Route::post('/Login','App\Http\Controllers\LoginController@login');

Route::get('/Logout', function (Request $request) {
    if($request->session()->has('username')){
        $request->session()->forget('username');
    }
    return redirect('/Login');
});

Route::post('/QuenMatKhau', 'App\Http\Controllers\ForgotPasswordController@postEmail');
Route::get('/QuenMatKhau', function () {
    return view('QuenMatKhau');
});

Route::post('/DoiMatKhau', 'App\Http\Controllers\ChangePasswordController@changePassword');
Route::get('/DoiMatKhau', function (Request $request) {
    if(!$request->session()->has('username')){
        return redirect('/Login');
    }
    return view('DoiMatKhau');
});

Route::get('/TaoTaiKhoan', function (Request $request) {
    if(!$request->session()->has('username')){
        return redirect('/Login');
    }
    return view('TaoTaiKhoan');
});
Route::post('/TaoTaiKhoan', 'App\Http\Controllers\RegisterController@register');

// Sửa thông tin
Route::get('/UpdateTaiKhoan/{Id}', 'App\Http\Controllers\SuaXoaTTController@edit');
Route::post('/UpdateTaiKhoan/{Id}', 'App\Http\Controllers\SuaXoaTTController@update');

// Hiển thị dữ liệu
Route::get('/UpdateTaiKhoan', 'App\Http\Controllers\SuaXoaTTController@index');

// Xóa thông tin
Route::get('/XoaTaiKhoan/{Id}', 'App\Http\Controllers\SuaXoaTTController@destroy');


Route::post('/api/ImportBenhVien/Xoa','App\Http\Controllers\ApiKetQuaImportBV@Xoa');
Route::post('/api/ImportBenhVien/Import','App\Http\Controllers\ApiKetQuaImportBV@Import');
Route::post('/ImportBenhVien/ImportAll','App\Http\Controllers\ImportBVController@ImportAll');

//Lịch sử tôn vinh
Route::get('/TaoMoiTonVinh',function(){
    return view('TaoMoiTonVinh');
});
Route::get('/XemKetQuaTonVinh',function(){
    return view('XemKetQuaTonVinh');
});
Route::get('/DanhSachTonVinh',function(){
    return view('DanhSachTonVinh');
});

//Import Bệnh Viện
Route::get('/ImportBenhVien',function (Request $request) {
    if(!$request->session()->has('username')){
        return redirect('/Login');
    }
    return view('ImportBenhVien');
});
Route::post('/ImportBenhVien','App\Http\Controllers\ImportBVController@import');

//Import Cơ Sở
Route::get('/ImportCoSo','App\Http\Controllers\ImportCoSoController@getView');
Route::post('/ImportCoSo','App\Http\Controllers\ImportCoSoController@importCoSo');
Route::post('/api/EditMucTonVinh','App\Http\Controllers\ImportCoSoController@ApiEditMucTV');

/*Lịch Sử Tôn Vinh*/ 
//Tạo mới Tôn vinh
Route::get('/TaoMoiTonVinh','App\Http\Controllers\LichSuTonVinhController@TaoMoiTonVinh');
Route::post('/TaoMoiTonVinh','App\Http\Controllers\LichSuTonVinhController@TaoMoiTonVinhPost');
//Xóa đợt tôn vinh
Route::get('/XoaDotTonVinh','App\Http\Controllers\LichSuTonVinhController@XoaDotTonVinh');
//Xem kết quả 1 năm bất kỳ
Route::get('/XemKetQuaTonVinh','App\Http\Controllers\LichSuTonVinhController@XemKetQua');
Route::post('/XemKetQuaTonVinh','App\Http\Controllers\LichSuTonVinhController@XemKetQuaPost');

// Tìm kiếm thông tin
Route::get('/TimKiemTonVinh', 'App\Http\Controllers\TimKiemController@index');
Route::get('/TimKiemTonVinh', 'App\Http\Controllers\TimKiemController@search');
// Cập nhập thông tin tìm kiếm
Route::get('/TimKiemTonVinh/{Id}', 'App\Http\Controllers\TimKiemController@edit');
Route::post('/TimKiemTonVinh/{Id}', 'App\Http\Controllers\TimKiemController@update');

Route::post('/ImportCoSo/ImportAll','App\Http\Controllers\ImportCoSoController@ImportAll');
Route::post('/api/XoaXuLyRieng','App\Http\Controllers\ImportCoSoController@XoaXuLyRieng');
Route::post('/api/ApplyXuLyRieng','App\Http\Controllers\ImportCoSoController@ApplyXuLyRieng');

Route::get('/KetQuaTonVinh', 'App\Http\Controllers\KetQuaTonVinhController@XemKetQua');
Route::post('/XacNhan', 'App\Http\Controllers\KetQuaTonVinhController@XacNhan');
Route::post('/XuatExcel', 'App\Http\Controllers\KetQuaTonVinhController@XuatExcel');