<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// //ĐĂNG KÝ
// Route::get('dangky', function() {
//     return view('dangky');
// });

// Route::post('taotaikhoan','QLSachController@Ham_taotk')->name('taoadmin');

// TK dang nhap : admin2 ,admin1
// mat khau   :789 ,56789

Route::get('dangnhap', function () {
    return view('dangnhap');
});
Route::post('dangnhap','QLSachController@Ham_dangnhap')->name('xulydangnhap');

//ĐĂNG XUẤT
route::get('dangxuat','QLSachController@dangxuat')->name('dangxuat');


Route::group(['prefix' => 'admin','middleware'=>'checkdangnhap'], function () {
    /**==============QL SÁCH========== */
    Route::get('danhsach', 'QLSachController@HienThi');    //Hiển thị
    //THÊM,
    Route::get('them','QLSachController@Goi_trang_them');//hiện ra form thêm + lấy data theo Nhà XB trong form thêm 
    Route::post('them','QLSachController@Ham_them')->name('xulythem');// Nhận dữ liệu trả về từ form và gọi hàm xử lý(Controller)

    //SỬA :đườngdẫn/{id}
    Route::get('sua/{id}','QLSachController@lay_data_sua');//hiện ra form sửa + lấy data theo ID trong form sửa 
    Route::post('sua/{id}','QLSachController@Ham_sua');//XỬ LÝ SỬA

    //XÓA đườngdẫn/{id}
    Route::get('xoa/{id}','QLSachController@Ham_xoa');//vào controller-->gọi hàm xóa


    /**==============QL NHÀ XUẤT BẢN========== */
    Route::get('nhaxb','NXBController@Hienthi_NXB');

    // THÊM NHÀ XUẤT BẢN
    Route::get('themnhaxb', function () {
        return view('themnxb');
    });
    Route::post('themnhaxb','NXBController@Ham_Them_NhaXB')->name('xuly_them_nhaxb');

    //SỬA :đườngdẫn/{id}
    Route::get('suanxb/{id}','NXBController@lay_data_sua');//hiện ra form sửa + lấy data theo ID trong form sửa 
    Route::post('suanxb/{id}','NXBController@Ham_sua');//XỬ LÝ SỬA

    Route::get('xoanxb/{id}','NXBController@Ham_xoa');//vào controller-->gọi hàm xóa

});

Route::get('gd', function () {
    return view('link');
});


