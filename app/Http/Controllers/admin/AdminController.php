<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\accounts;
use App\Models\appointment_schedules;
use App\Models\payment_status;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    // Middleware
    function __construct()
    {
        $this->middleware('Check.Is.Admin');
    }

        // GET: http://localhost/Project2Final/admin/home
        // Trang home của admin
        function viewHome()
        {
            return view('admin-layout/dashboard_homepage/home');
        }

        function viewDoiMatKhau() {
            return view('admin-layout/Change_Password/doimatkhau');
        }

        function DoiMatKhau(Request $request)
        {
            $this->validate($request, [
                'password' => ['required', Password::min(10)->letters()->mixedCase()->symbols()],
                'confirm_password' => ['required', 'same:password'],
            ]);

            accounts::whereId(auth()->user()->id)->update([
            'password' => bcrypt($request->password)
            ]);
            return redirect('/admin/changepassword')->with("success", "Mật khẩu đã được đổi thành công");
        }

        function viewQuanLyKhachHang()
        {
            $accounts = accounts::where('isCustomer', '=', '1')
                ->where('status', '=', '0')
                ->get();
            return view('admin-layout/Quan_Ly_Khach_Hang/customer-all', ['accounts' => $accounts]);
        }

        function editKhach($id)
        {
            $accounts = accounts::where('id', '=', $id)->first();
            return view('admin-layout/Quan_Ly_Khach_Hang/customer-edit', compact('accounts'));
        }

        function updateKhach(RegisterRequest $request, $id)
        {
            $validated = $request->validated();
            if ($validated) {
                $accounts = accounts::findOrFail($id);
                $accounts->name = $request->name;
                $accounts->username = $request->username;
                $accounts->password = bcrypt($request->password);
                $accounts->save();
                return redirect('admin/quanlykhachhang/')->with('editDone', 'Cập nhật thông tin tài khoản khách hang thành công!');
            }
        }

        function deleteKhach($id) {
            // Tìm đến đối tượng muốn xóa
            $accounts = accounts::findOrFail($id);
            $accounts->delete();
            return redirect('admin/quanlykhachhang/')->with('deleteDone', 'Xóa tài khoản thành công!');
        }

        function viewQuanLyKhachHang_KhoaTaiKhoan()
        {
            $accounts = accounts::where('isCustomer', '=', '1')
                ->where('status', '=', '1')
                ->get();
            return view('admin-layout/Quan_Ly_Khach_Hang/khoa_tai_khoan', ['accounts' => $accounts]);
        }

        function KhoaTaiKhoan_Khach(Request $request, $id) {
            $accounts = accounts::findOrFail($id);
            $accounts->status = 1;
            $accounts->save();
            return redirect('/admin/quanlykhachhang/lock')->with('success', 'Khóa tài khoản thành công');
        }

        function MoKhoaTaiKhoan_Khach(Request $request, $id) {
            $accounts = accounts::findOrFail($id);
            $accounts->status = 0;
            $accounts->save();
            return redirect('/admin/quanlykhachhang')->with('success', 'Mở khóa tài khoản thành công');
        }

        // GET: http://localhost/Project2Final/admin/quanlybacsi
        // Trang giao diện quản lý bác sĩ chung
        function viewQuanLyBacsi()
        {
            $bacsi = accounts::where('isDoctor', '=', '1')
                ->where('status' , '=', 0)
                ->get();
            return view('admin-layout/Quan_Ly_Bac_Si/bacsi-all', ['bacsi' => $bacsi]);
        }

        // GET: http://localhost/Project2Final/admin/quanlybacsi/add
        // Trang giao diện thêm bác sĩ
        function viewQuanLyBacsi_Add()
        {
            return view('admin-layout/Quan_Ly_Bac_Si/bacsi-add');
        }
        // Xử lý thêm bác sĩ
        function addbacsi(RegisterRequest $request)
        {
            $validated = $request->validated();
            if ($validated) {
                $accounts = new accounts();
                // syntax: $tên_biến -> tên_cột_trên_bảng = $request -> name(giá trị thẻ name trong html)
                $accounts->username = $request->username;
                $accounts->password = bcrypt($request->password);
                $accounts->name = $request->name;
                $accounts->phones = $request->phone;
                $accounts->date_of_births = $request->date_of_birth;
                $accounts->genders = $request->gender;
                $accounts->address = $request->address;
                $accounts->isDoctor = "1";
                $accounts->save();
                return redirect('admin/quanlybacsi/')->with('success', 'Thêm bác sĩ thành công!');
            }
        }
        // GET: http://localhost/Project2Final/admin/quanlybacsi/edit/{id}
        // Trang giao diện sửa bác sĩ
        function editDoctor($id)
        {
            $accounts = accounts::where('id', '=', $id)->first();
            return view('admin-layout/Quan_Ly_Bac_Si/bacsi-edit', compact('accounts'));
        }

        // POST: http://localhost/Project2Final/admin/quanlybacsi/edit/{id}
        // update thông tin bác sĩ
        function updateDoctor(RegisterRequest $request, $id)
        {
            $validated = $request->validated();
            if ($validated) {
                $accounts = accounts::findOrFail($id);
                $accounts->username = $request->username;
                $accounts->password = bcrypt($request->password);
                $accounts->name = $request->name;
                $accounts->phones = $request->phone;
                $accounts->date_of_births = $request->date_of_birth;
                $accounts->genders = $request->gender;
                $accounts->address = $request->address;
                $accounts->save();
                return redirect('admin/quanlybacsi/')->with('editDone', 'Cập nhật thông tin bác sĩ thành công!');
            }
        }

        // POST: http://localhost/Project2Final/admin/quanlybacsi/delete/{id}
        // Trang giao diện xóa bác sĩ
        function deletedoctor($id) {
            // Tìm đến đối tượng muốn xóa
            $accounts = accounts::findOrFail($id);
            $accounts->delete();
            return redirect('admin/quanlybacsi/')->with('deleteDone', 'Xóa bác sĩ thành công!');
        }

        function viewQuanLyBacsi_KhoaTaiKhoan()
        {
            $bacsi = accounts::where('isDoctor', '=', '1')
                ->where('status', '=', '1')
                ->get();
            return view('admin-layout/Quan_Ly_Bac_Si/khoa_tai_khoan', ['bacsi' => $bacsi]);
        }

        function KhoaTaiKhoan_Bacsi(Request $request, $id) {
            $bacsi = accounts::findOrFail($id);
            $bacsi->status = 1;
            $bacsi->save();
            return redirect('/admin/quanlybacsi/lock')->with('success', 'Khóa tài khoản thành công');
        }

        function MoKhoaTaiKhoan_Bacsi(Request $request, $id) {
            $bacsi = accounts::findOrFail($id);
            $bacsi->status = 0;
            $bacsi->save();
            return redirect('/admin/quanlybacsi')->with('success', 'Mở khóa tài khoản thành công');
        }

        function viewLichHenChuaThanhToan()
        {
            $appointment_schedule = appointment_schedules::where('payment_status', '=', '0')
                ->where('status', '=', '1')
                ->get();
            return view('admin-layout/Quan_Ly_Lich_Hen_XacNhan_ThanhToan/chua_thanh_toan', ['appointment_schedule' => $appointment_schedule]);
        }

        // GET: http://localhost/Project2Final/admin/quanlylichhen/edit/{id}
        // Trang sửa lịch hen
        function editLichHen($id)
        {
            $appointment_schedule = appointment_schedules::where('id', '=', $id)->first();
            return view('admin-layout/Quan_Ly_Lich_Hen_XacNhan_ThanhToan/chua_xac_nhan-edit', compact('appointment_schedule'));
        }

        // POST: http://localhost/Project2Final/admin/quanlylichhen/edit/{id}
        // update thông tin lịch hẹn
        function updateLichHen(Request $request, $id)
        {
            $appointment_schedule = appointment_schedules::findOrFail($id);
            $appointment_schedule->names = $request->name;
            $appointment_schedule->phones = $request->phone;
            $appointment_schedule->dates = $request->date;
            $appointment_schedule->times = $request->time;
            $appointment_schedule->prices = $request->price;
            $appointment_schedule->save();
            return redirect('admin/lichhenchuaxacnhan')->with('editDone', 'Cập nhật thông tin lịch hẹn thành công!');
        }

        // GET: http://localhost/Project2Final/admin/quanlylichhen/delete/{id}
        // Trang giao diện xóa bác sĩ
        function deleteLichHen($id) {
            // Tìm đến đối tượng muốn xóa
            $accounts = appointment_schedules::findOrFail($id);
            $accounts->delete();
            return redirect('admin/lichhenchuaxacnhan/')->with('deleteDone', 'Xóa lịch hẹn thành công!');
        }

        function viewLichHenChuaXacNhan()
        {
            $lich_chua_xac_nhan = appointment_schedules::where('status', '=', '0')->get();
            return view('admin-layout/Quan_Ly_Lich_Hen_XacNhan_ThanhToan/chua_xac_nhan', ['lich_chua_xac_nhan' => $lich_chua_xac_nhan]);
        }

        function LichHenChuaXacNhan_sang_LichHenDaXacNhan(Request $request, $id) {
            $appointment_schedules = appointment_schedules::findOrFail($id);
            $appointment_schedules->status = 1;
            $appointment_schedules->save();
            return redirect('/admin/lichhendaxacnhan')->with('success', 'Lịch hẹn đã xác nhận thành công');
        }

        function LichHenDaXacNhan_sang_LichHenChuaXacNhan(Request $request, $id) {
            $appointment_schedules = appointment_schedules::findOrFail($id);
            $appointment_schedules->status = 0;
            $appointment_schedules->save();
            return redirect('/admin/lichhenchuaxacnhan')->with('success1', 'Hủy xác nhận lịch hẹn thành công');
        }

        function viewLichHenDaXacNhan()
        {
            $lich_da_xac_nhan = appointment_schedules::where('status', '=', '1')->get();
            return view('admin-layout/Quan_Ly_Lich_Hen_XacNhan_ThanhToan/da_xac_nhan', ['lich_da_xac_nhan' => $lich_da_xac_nhan]);
        }

        // GET: http://localhost/Project2Final/admin/lichhendathanhtoan
        // Trang lịch hẹn đã thanh toán
        function viewLichHenDaThanhToan()
        {
            $lich_da_thanh_toan = appointment_schedules::where('payment_status', '=', '1')
                ->where('status', '=', '1')
                ->get();
            return view('admin-layout/Quan_Ly_Lich_Hen_XacNhan_ThanhToan/da_thanh_toan', ['lich_da_thanh_toan' => $lich_da_thanh_toan]);
        }

        function TrangThaiLichHen_sang_DaThanhToan(Request $request, $id) {
            $appointment_schedules = appointment_schedules::findOrFail($id);
            $appointment_schedules->payment_status = 1;
            $appointment_schedules->save();
            return redirect('/admin/lichhendathanhtoan')->with('success', 'Chuyển về lịch hẹn đã thanh toán thành công');
        }

        function DaThanhToan_sang_ChuaThanhToan(Request $request, $id) {
            $appointment_schedules = appointment_schedules::findOrFail($id);
            $appointment_schedules->payment_status = 0;
            $appointment_schedules->save();
            return redirect('/admin/lichhenchuathanhtoan')->with('success', 'Chuyển về lịch hẹn chưa thanh toán thành công');
        }
}
