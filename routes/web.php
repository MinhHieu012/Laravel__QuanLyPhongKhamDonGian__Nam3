<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\doctor\DoctorController;
use App\Models\appointment_schedules;
use http\Client\Request;
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

//---------------------------CustomerController-----------------------------
// trang register
Route::get('/register', [CustomerController::class, 'viewRegister']);

// xử lý register (ko có giao diện)
Route::post('/register', [CustomerController::class, 'register']);

// trang login
Route::get('/login', [CustomerController::class, 'viewLogin']);

// xử lý login (ko có giao diện)
Route::post('/login', [CustomerController::class, 'login']);

// trang xử lý logout (ko có giao diện)
Route::post('/logout', [CustomerController::class, 'logout']);

// trang đổi mật khẩu
Route::get('/user/changepassword', [CustomerController::class, 'viewDoiMatKhau']);

// Xử lý đổi mật khẩu(ko giao diện)
Route::post('/user/changepassword', [CustomerController::class, 'DoiMatKhau']);

// trang chủ home
Route::get('/', [CustomerController::class, 'viewHome']);

// trang chủ giới thiệu
Route::get('/introduce', [CustomerController::class, 'viewIntroduce']);

// trang đặt lịch
Route::get('/datlich', [CustomerController::class, 'viewDatLich']);
// xử lý đặt lịch (ko có giao diện)
Route::post('/datlich', [CustomerController::class, 'datlich']);

// trang chi tiết lịch hẹn
Route::get('/datlich/chitiet/{id}', [CustomerController::class, 'viewChiTietDatLich']);

// giao diện edit lịch hẹn
Route::get('/datlich/edit/{id}', [CustomerController::class, 'editLich'])
       ->name('datlich.edit');
// update lịch hẹn
Route::post('/datlich/edit/{id}', [CustomerController::class, 'updateLich'])
    ->name('datlich.update');

// (Xóa) Hủy lịch hẹn
Route::post('/datlich/delete/{id}', [CustomerController::class, 'deleteLich'])
       ->name('lichhen.delete');

// trang liên hệ
Route::get('/lienhe', [CustomerController::class, 'viewLienHe']);
//-----------------------------------------------------------------------------



//---------------------------AdminController-----------------------------
// trang home admin
Route::get('/admin/home', [AdminController::class, 'viewHome']);

// trang đổi mật khẩu
Route::get('/admin/changepassword', [AdminController::class, 'viewDoiMatKhau']);

// Xử lý đổi mật khẩu(ko giao diện)
Route::post('/admin/changepassword', [AdminController::class, 'DoiMatKhau']);

// trang quản lý tài khoản khách hàng
Route::get('/admin/quanlykhachhang', [AdminController::class, 'viewQuanLyKhachHang']);

// trang khóa tài khoản khách
Route::get('/admin/quanlykhachhang/lock', [AdminController::class, 'viewQuanLyKhachHang_KhoaTaiKhoan']);

// Xử lý khóa tài khoản khách
Route::post('/admin/quanlykhachhang/lock/{id}', [AdminController::class, 'KhoaTaiKhoan_Khach']);

// Xử lý mở lại tài khoản khách
Route::post('/admin/quanlykhachhang/unlock/{id}', [AdminController::class, 'MoKhoaTaiKhoan_Khach']);

// Xóa tài khoản khách
Route::get('/admin/quanlykhachhang/delete/{id}', [AdminController::class, 'deleteKhach']);

// admin - trang sửa khách hàng
Route::get('/admin/quanlykhachhang/edit/{id}', [AdminController::class, 'editKhach']);
Route::post('/admin/quanlykhachhang/edit/{id}', [AdminController::class, 'updateKhach']);

// admin - trang quản lý bác sĩ
Route::get('/admin/quanlybacsi', [AdminController::class, 'viewQuanLyBacsi']);

// admin - trang quản lý bác sĩ (thêm bác sĩ)
Route::get('/admin/quanlybacsi/add', [AdminController::class, 'viewQuanLyBacsi_Add']);
// Xử lý thêm bác sĩ
Route::post('/admin/quanlybacsi/add', [AdminController::class, 'addbacsi']);
// Xóa bác sĩ
Route::get('/admin/quanlybacsi/delete/{id}', [AdminController::class, 'deletedoctor'])->name('doctor.delete');

// admin - trang quản lý bác sĩ (sửa bác sĩ)
Route::get('/admin/quanlybacsi/edit/{id}', [AdminController::class, 'editDoctor']);
Route::post('/admin/quanlybacsi/edit/{id}', [AdminController::class, 'updateDoctor']);

// trang khóa tài khoản bác sĩ
Route::get('/admin/quanlybacsi/lock', [AdminController::class, 'viewQuanLyBacsi_KhoaTaiKhoan']);

// Reset mật khẩu bác sĩ
Route::post('/admin/quanlybacsi/resetpassword/{id}', [AdminController::class, 'ResetPassword_Bacsi']);

// Xử lý khóa tài khoản bác sĩ
Route::post('/admin/quanlybacsi/lock/{id}', [AdminController::class, 'KhoaTaiKhoan_Bacsi']);

// Xử lý mở lại tài khoản bác sĩ
Route::post('/admin/quanlybacsi/unlock/{id}', [AdminController::class, 'MoKhoaTaiKhoan_Bacsi']);

// trang quản lý gói khám (hiển thị all gói khám)
Route::get('/admin/quanlygoikham/', [AdminController::class, 'viewQuanLyGoiKham']);

// admin - trang quản lý gói khám (thêm gói khám)
Route::get('/admin/quanlygoikham/add', [AdminController::class, 'viewQuanLyGoiKham_Add']);
// Xử lý thêm gói khám
Route::post('/admin/quanlygoikham/add', [AdminController::class, 'addGoiKham']);

// admin - trang quản lý gói khám (sửa gói khám)
Route::get('/admin/quanlygoikham/edit/{id}', [AdminController::class, 'editGoiKham']);
Route::post('/admin/quanlygoikham/edit/{id}', [AdminController::class, 'updateGoiKham']);

// Xóa gói khám
Route::get('/admin/quanlygoikham/delete/{id}', [AdminController::class, 'deleteGoiKham']);

// trang quản lý thời gian hẹn (hiển thị all thời gian hẹn)
Route::get('/admin/quanlythoigianhen/', [AdminController::class, 'viewQuanLyThoiGianHen']);

// admin - trang quản lý thời gian hẹn (thêm thời gian hẹn)
Route::get('/admin/quanlythoigianhen/add', [AdminController::class, 'viewQuanLyThoiGianHen_Add']);
// Xử lý thêm thời gian hẹn
Route::post('/admin/quanlythoigianhen/add', [AdminController::class, 'addThoiGianHen']);

// admin - trang quản lý thời gian hẹn (sửa thời gian hẹn)
Route::get('/admin/quanlythoigianhen/edit/{id}', [AdminController::class, 'editThoiGianHen']);
Route::post('/admin/quanlythoigianhen/edit/{id}', [AdminController::class, 'updateThoiGianHen']);

// Xóa thời gian hẹn
Route::get('/admin/quanlythoigianhen/delete/{id}', [AdminController::class, 'deleteThoiGianHen']);







// trang thông tin phòng khám (hiển thị all phòng khám)
Route::get('/admin/thongtinphongkham/', [AdminController::class, 'viewThongTinPhongKham']);

// admin - trang thông tin phòng khám (thêm phòng khám)
Route::get('/admin/thongtinphongkham/add', [AdminController::class, 'viewThongTinPhongKham_Add']);
// Xử lý thêm phòng khám
Route::post('/admin/thongtinphongkham/add', [AdminController::class, 'addPhongKham']);

// admin - trang thông tin phòng khám (sửa phòng khám)
Route::get('/admin/thongtinphongkham/edit/{id}', [AdminController::class, 'editPhongKham']);
Route::post('/admin/thongtinphongkham/edit/{id}', [AdminController::class, 'updatePhongKham']);

// Xóa phòng khám
Route::get('/admin/thongtinphongkham/delete/{id}', [AdminController::class, 'deletePhongKham']);










// admin - trang lịch hẹn chưa xác nhận
Route::get('/admin/lichhenchuaxacnhan', [AdminController::class, 'viewLichHenChuaXacNhan']);

// admin - trang sửa trạng lịch hẹn chưa xác nhận -> đã xác nhận
Route::post('/admin/lichhen/xacnhan/{id}', [AdminController::class, 'LichHenChuaXacNhan_sang_LichHenDaXacNhan']);

// admin - trang sửa trạng lịch hẹn đã xác nhận -> chưa xác nhận
Route::post('/admin/lichhen/chuaxacnhan/{id}', [AdminController::class, 'LichHenDaXacNhan_sang_LichHenChuaXacNhan']);

// admin - trang lịch hẹn đã xác nhận
Route::get('/admin/lichhendaxacnhan', [AdminController::class, 'viewLichHenDaXacNhan']);

// admin - trang quản lý lịch hẹn chưa thanh toán
Route::get('/admin/lichhenchuathanhtoan', [AdminController::class, 'viewLichHenChuaThanhToan']);

// admin - trang quản lý lịch hẹn (thêm lịch hẹn)
/*Route::get('/admin/quanlylichhen/add', [AdminController::class, 'viewLichHen_Add']);
Route::post('/admin/quanlylichhen/add', [AdminController::class, 'addLichHen1']);*/

// admin - trang quản lý lịch hẹn (sửa lịch hẹn)
Route::get('/admin/quanlylichhen/edit/{id}', [AdminController::class, 'editLichHen'])->name('admin.editLichHen');
Route::post('/admin/quanlylichhen/edit/{id}', [AdminController::class, 'updateLichHen'])->name('admin.editLichHen');

// Xóa lịch hẹn
Route::get('/admin/quanlylichhen/delete/{id}', [AdminController::class, 'deleteLichHen'])->name('admin.deleteLichHen');

// admin - trang lịch hẹn đã thanh toán
Route::get('/admin/lichhendathanhtoan', [AdminController::class, 'viewLichHenDaThanhToan']);

// admin - trang sửa trạng thái lịch hẹn -> đã thanh toán
Route::post('/admin/quanlylichhen/paid/{id}', [AdminController::class, 'TrangThaiLichHen_sang_DaThanhToan']);

// admin - trang sửa trạng thái lịch hẹn -> chưa thanh toán
Route::post('/admin/quanlylichhen/unpaid/{id}', [AdminController::class, 'DaThanhToan_sang_ChuaThanhToan']);

//-----------------------------------------------------------------------------



//---------------------------DoctorController-----------------------------
// trang home doctor
Route::get('/doctor/home', [DoctorController::class, 'viewHome']);

// trang giao diện sửa thông tin bác sĩ
Route::get('/doctor/hoso/edit', [DoctorController::class, 'viewHoSo_Edit']);
// trang cập nhật thông tin bác sĩ (không giao diện)
Route::post('/doctor/hoso/edit', [DoctorController::class, 'HoSo_Update']);

// trang đổi mật khẩu doctor
Route::get('/doctor/changepassword', [DoctorController::class, 'viewDoiMatKhau']);

// Xử lý đổi mật khẩu doctor (ko giao diện)
Route::post('/doctor/changepassword', [DoctorController::class, 'DoiMatKhau']);

// trang hồ sơ thông tin bác sĩ
Route::get('/doctor/hoso', [DoctorController::class, 'viewHoSo']);

// trang quản lý lịch hẹn của bác sĩ
Route::get('/doctor/lichhenchuakham', [DoctorController::class, 'viewLichHenChuaKham']);

// trang quản lý lịch hẹn của bác sĩ
// trang sửa thông tin trạng thái khám, tư vấn khách hàng
Route::get('/doctor/lichhen/edit', [DoctorController::class, 'viewLichHen_Edit']);

// trang lịch hẹn đang khám
Route::get('/doctor/lichhendangkham', [DoctorController::class, 'viewLichHenDangKham']);

// trang lịch hẹn đã khám
Route::get('/doctor/lichhendakham', [DoctorController::class, 'viewLichHenDaKham']);

// sửa trạng thái chưa khám -> đang khám
Route::post('/doctor/lichhen/dangkham/{id}', [DoctorController::class, 'ChuaKham_sang_DangKham']);

// sửa trạng thái đang khám -> chưa khám khám
Route::post('/doctor/lichhen/chuakham/{id}', [DoctorController::class, 'DangKham_sang_ChuaKham']);

// sửa trạng thái đang khám -> đã khám xong
Route::post('/doctor/lichhen/dakham/{id}', [DoctorController::class, 'DangKham_sang_DaKham']);

// sửa trạng thái đang khám xong -> chưa khám xong
Route::post('/doctor/lichhen/backdangkham/{id}', [DoctorController::class, 'DaKham_sang_DangKham']);
