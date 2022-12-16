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
            return view('admin-layout/admin-home');
        }

        // GET: http://localhost/Project2Final/admin/quanlybacsi
        // Trang giao diện quản lý bác sĩ chung
        function viewQuanLyBacsi()
        {
            $bacsi = accounts::where('isDoctor', '=', '1')->get();
            return view('admin-layout/trang-quanlybacsi', ['bacsi' => $bacsi]);
        }

        // GET: http://localhost/Project2Final/admin/quanlybacsi/add
        // Trang giao diện thêm bác sĩ
        function viewQuanLyBacsi_Add()
        {
            return view('admin-layout/trang-quanlybacsi-add');
        }
        // Xử lý thêm bác sĩ
        function addbacsi(RegisterRequest $request)
        {
            $validated = $request->validated();
            if ($validated) {
                $accounts = new accounts();
                // syntax: $tên_bảng_db -> tên_cột_trên_bảng = $request -> name(giá trị thẻ name trong html)
                $accounts->email = $request->email;
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
            return view('admin-layout/trang-quanlybacsi-edit', compact('accounts'));
        }

        // POST: http://localhost/Project2Final/admin/quanlybacsi/edit/{id}
        // update thông tin bác sĩ
        function updateDoctor(RegisterRequest $request, $id)
        {
            $validated = $request->validated();
            if ($validated) {
                $accounts = accounts::findOrFail($id);
                $accounts->email = $request->email;
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

        // GET: http://localhost/Project2Final/admin/quanlybacsi/delete/{id}
        // Trang giao diện xóa bác sĩ
        function deletedoctor($id) {
            // Tìm đến đối tượng muốn xóa
            $accounts = accounts::findOrFail($id);
            $accounts->delete();
            return redirect('admin/quanlybacsi/')->with('deleteDone', 'Xóa bác sĩ thành công!');
        }

        // GET: http://localhost/Project2Final/admin/quanlylichhen
        // Trang giao diện quản lý lịch hẹn
        function viewQuanLyLichHen()
        {
            $appointment_schedule = appointment_schedules::all();
            return view('admin-layout/trang-quanlylichhen', ['appointment_schedule' => $appointment_schedule]);
        }

        // GET: http://localhost/Project2Final/admin/quanlylichhen/edit/{id}
        // Trang sửa lịch hen
        function editLichHen($id)
        {
            $appointment_schedule = appointment_schedules::where('id', '=', $id)->first();
            return view('admin-layout/trang-quanlylichhen-edit', compact('appointment_schedule'));
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
            return redirect('admin/quanlylichhen')->with('editDone', 'Cập nhật thông tin lịch hẹn thành công!');
        }

        // GET: http://localhost/Project2Final/admin/quanlylichhen/delete/{id}
        // Trang giao diện xóa bác sĩ
        function deleteLichHen($id) {
            // Tìm đến đối tượng muốn xóa
            $accounts = appointment_schedules::findOrFail($id);
            $accounts->delete();
            return redirect('admin/quanlylichhen/')->with('deleteDone', 'Xóa lịch hẹn thành công!');
        }

        // GET: http://localhost/Project2Final/admin/lichhendathanhtoan
        // Trang lịch hẹn đã thanh toán
        function viewLichHenDaThanhToan()
        {
            $lich_da_thanh_toan = appointment_schedules::all();

            /*$lich_da_thanh_toan = DB::table('appointment_schedules')
                ->where('payment_status_id')
                ->find(2);*/

            return view('admin-layout/lichhendathanhtoan', ['lich_da_thanh_toan' => $lich_da_thanh_toan]);

        }
}
