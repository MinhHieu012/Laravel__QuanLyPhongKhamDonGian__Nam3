<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\doctor\DoctorController;
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

// trang chủ home
Route::get('/', [CustomerController::class, 'viewHome']);

// trang chủ giới thiệu
Route::get('/introduce', [CustomerController::class, 'viewIntroduce']);

// trang đặt lịch
Route::get('/datlich', [CustomerController::class, 'viewDatLich']);
// xử lý đặt lịch (ko có giao diện)
Route::post('/datlich', [CustomerController::class, 'datlich']);

// giao diện edit lịch hẹn
Route::get('/datlich/edit/{id}', [CustomerController::class, 'editLich'])
       ->name('datlich.edit');
// giao diện edit lịch hẹn
Route::post('/datlich/edit/{id}', [CustomerController::class, 'updateLich'])
    ->name('datlich.update');

// (Xóa) Hủy lịch hẹn
Route::get('/datlich/delete/{id}', [CustomerController::class, 'deleteLich'])
       ->name('lichhen.delete');

// trang liên hệ
Route::get('/lienhe', [CustomerController::class, 'viewLienHe']);
//-----------------------------------------------------------------------------



//---------------------------AdminController-----------------------------
// trang home admin
Route::get('/admin/home', [AdminController::class, 'viewHome']);

// admin - trang quản lý bác sĩ
Route::get('/admin/quanlybacsi', [AdminController::class, 'viewQuanLyBacsi']);

// admin - trang quản lý bác sĩ (thêm bác sĩ)
Route::get('/admin/quanlybacsi/add', [AdminController::class, 'viewQuanLyBacsi_Add']);
// Xử lý thêm bác sĩ
Route::post('/admin/quanlybacsi/add', [AdminController::class, 'addbacsi']);
// Xóa bác sĩ
Route::get('/admin/quanlybacsi/delete/{id}', [AdminController::class, 'deletedoctor'])->name('doctor.delete');

// admin - trang quản lý bác sĩ (sửa bác sĩ)
Route::get('/admin/quanlybacsi/edit/{id}', [AdminController::class, 'editDoctor'])->name('doctor.edit');
Route::post('/admin/quanlybacsi/edit/{id}', [AdminController::class, 'updateDoctor'])->name('doctor.edit');

// admin - trang quản lý lịch hẹn
Route::get('/admin/quanlylichhen', [AdminController::class, 'viewQuanLyLichHen']);

// admin - trang quản lý lịch hẹn (sửa lịch hẹn)
Route::get('/admin/quanlylichhen/edit/{id}', [AdminController::class, 'editLichHen'])->name('admin.editLichHen');
Route::post('/admin/quanlylichhen/edit/{id}', [AdminController::class, 'updateLichHen'])->name('admin.editLichHen');

// Xóa lịch hẹn
Route::get('/admin/quanlylichhen/delete/{id}', [AdminController::class, 'deleteLichHen'])->name('admin.deleteLichHen');

// admin - trang lịch hẹn đã thanh toán
Route::get('/admin/lichhendathanhtoan', [AdminController::class, 'viewLichHenDaThanhToan']);
//-----------------------------------------------------------------------------



//---------------------------DoctorController-----------------------------
// trang home doctor
Route::get('/doctor/home', [DoctorController::class, 'viewHome']);

// trang hồ sơ thông tin bác sĩ
Route::get('/doctor/hoso', [DoctorController::class, 'viewHoSo']);

// trang quản lý lịch hẹn của bác sĩ
Route::get('/doctor/lichhen', [DoctorController::class, 'viewLichHen']);

// trang quản lý lịch hẹn của bác sĩ
// trang sửa thông tin trạng thái khám, tư vấn khách hàng
Route::get('/doctor/lichhen/edit', [DoctorController::class, 'viewLichHen_Edit']);

// trang lịch hẹn đang khám
Route::get('/doctor/lichhendangkham', [DoctorController::class, 'viewLichHenDangKham']);

// trang lịch hẹn đã khám
Route::get('/doctor/lichhendakham', [DoctorController::class, 'viewLichHenDaKham']);

