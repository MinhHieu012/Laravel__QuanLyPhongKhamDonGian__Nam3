<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\accounts;
use App\Models\appointment_schedules;
use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class DoctorController extends Controller
{
    // Middleware
    function __construct()
    {
        $this->middleware('Check.Is.Doctor');
    }

    // GET: http://localhost/Project2Final/doctor/home
    // Trang home của doctor
    function viewHome() {
        $datlich = appointment_schedules::all();
        return view('doctor-layout/dashboard_homepage/home', ['datlich' => $datlich]);
    }

    function viewDoiMatKhau() {
        return view('doctor-layout/Change_Password/doimatkhau');
    }

    function DoiMatKhau(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', Password::min(10)->letters()->mixedCase()->symbols()],
            'confirm_password' => ['required', 'same:password'],

            ['password.required' => 'Mật khẩu phải có 10 kí tự bao gồm ít nhất: 1 chữ thường, 1 chữ in hoa, Số 0-9, Kí tự đặc biệt (@, !, ...)',
             'confirm_password.required' => 'Mật khẩu xác nhận không trùng khớp']
        ]);

        accounts::whereId(auth()->user()->id)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('/doctor/changepassword')->with("success", "Mật khẩu đã được đổi thành công");
    }

    // Trang hồ sơ thông tin bác sĩ
    function viewHoSo() {
        return view('doctor-layout/info_bacsi/hoso');
    }

    // GET: http://localhost/Project2Final/doctor/lichhen
    // Trang hồ sơ thông tin bác sĩ
    function viewLichHenChuaKham(Request $request) {

        $appointments = appointment_schedules::where('appointment_status', '=', '0')
                ->where('status', '=', '1')
                ->where('doctor_examines', Auth::user()->name)
                ->get();

        // Convert the dates field to a Carbon instance
        $appointments->transform(function ($appointment) {
            $appointment->dates = Carbon::parse($appointment->dates);
            return $appointment;
        });

        // Group the appointments by the dates field
        $appointmentsByDate = $appointments->groupBy(function ($appointment) {
            return $appointment->dates->format('d-m-Y');
        });

        // Pass the grouped appointments to the view
        return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/chua_kham', ['appointments' => $appointmentsByDate]);

        //return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/chua_kham', ['datlich' => $datlich]);
    }

    function viewLichHenDangKham() {
        $appointments = appointment_schedules::where('appointment_status', '=', '1')
            ->where('status', '=', '1')
            ->get();

        // Convert the dates field to a Carbon instance
        $appointments->transform(function ($appointment) {
            $appointment->dates = Carbon::parse($appointment->dates);
            return $appointment;
        });

        // Group the appointments by the dates field
        $appointmentsByDate = $appointments->groupBy(function ($appointment) {
            return $appointment->dates->format('d-m-Y');
        });

        // Pass the grouped appointments to the view
        return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/dang_kham', ['appointments' => $appointmentsByDate]);
        //return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/dang_kham', ['datlich' => $datlich]);
    }

    // GET: http://localhost/Project2Final/doctor/lichhendakham
    // trang lịch hẹn đã khám
    function viewLichHenDaKham() {
        $appointments = appointment_schedules::where('appointment_status', '=', '2')
            ->where('status', '=', '1')
            ->get();

        // Convert the dates field to a Carbon instance
        $appointments->transform(function ($appointment) {
            $appointment->dates = Carbon::parse($appointment->dates);
            return $appointment;
        });

        // Group the appointments by the dates field
        $appointmentsByDate = $appointments->groupBy(function ($appointment) {
            return $appointment->dates->format('d-m-Y');
        });

        // Pass the grouped appointments to the view
        return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/da_kham_xong', ['appointments' => $appointmentsByDate]);

        //return view('/doctor-layout/Quan_Ly_Lich_Hen_TinhTrangKham/da_kham_xong', ['datlich' => $datlich]);
    }

    function ChuaKham_sang_DangKham(Request $request, $id) {

        $appointment_schedules = appointment_schedules::findOrFail($id);
        $appointment_schedules->appointment_status = 1;

        accounts::where('isDoctor', 1)
            ->where('doctorStatus', 0)
            ->update(['doctorStatus' => 1]);

        $appointment_schedules->save();
        return redirect('/doctor/lichhendangkham')->with('success', 'Chuyển về lịch hẹn đang khám thành công');
    }

    function DangKham_sang_ChuaKham(Request $request, $id) {
        $appointment_schedules = appointment_schedules::findOrFail($id);
        $appointment_schedules->appointment_status = 0;

        accounts::where('isDoctor', 1)
            ->where('doctorStatus', 1)
            ->update(['doctorStatus' => 0]);

        $appointment_schedules->save();
        return redirect('/doctor/lichhenchuakham')->with('success', 'Chuyển về lịch hẹn chưa khám thành công');
    }

    function DangKham_sang_DaKham(Request $request, $id) {
        $appointment_schedules = appointment_schedules::findOrFail($id);
        $appointment_schedules->appointment_status = 2;

        accounts::where('isDoctor', 1)
            ->where('doctorStatus', 1)
            ->update(['doctorStatus' => 0]);

        $appointment_schedules->save();
        return redirect('/doctor/lichhendakham')->with('success', 'Chuyển về lịch hẹn đã khám xong thành công');
    }

    function DaKham_sang_DangKham(Request $request, $id) {
        $appointment_schedules = appointment_schedules::findOrFail($id);
        $appointment_schedules->appointment_status = 1;

        accounts::where('isDoctor', 1)
            ->where('doctorStatus', 0)
            ->update(['doctorStatus' => 1]);

        $appointment_schedules->save();
        return redirect('/doctor/lichhendangkham')->with('success1', 'Chuyển về lịch hẹn đã khám xong thành công');
    }
}

