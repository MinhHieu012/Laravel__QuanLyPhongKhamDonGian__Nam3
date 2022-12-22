<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\appointment_schedules;
use Illuminate\Http\Request;

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
        return view('doctor-layout/doctor-home', ['datlich' => $datlich]);
    }

    // GET: http://localhost/Project2Final/doctor/hoso
    // Trang hồ sơ thông tin bác sĩ
    function viewHoSo() {
        return view('doctor-layout/doctor-hoso');
    }

    // GET: http://localhost/Project2Final/doctor/lichhen
    // Trang hồ sơ thông tin bác sĩ
    function viewLichHen() {
        $datlich = appointment_schedules::all();
        return view('/doctor-layout/doctor-lichhen', ['datlich' => $datlich]);
    }

    // GET: http://localhost/Project2Final/doctor/lichhen
    // trang sửa thông tin trạng thái khám, tư vấn khách hàng
    function viewLichHen_Edit() {
        return view('doctor-layout/sua-lichhen');
    }

    // GET: http://localhost/Project2Final/doctor/lichhendakham
    // trang lịch hẹn đã khám
    function viewLichHenDaKham() {
        $datlich = appointment_schedules::all();
        return view('doctor-layout/lichhendakham', ['datlich' => $datlich]);
    }
}

