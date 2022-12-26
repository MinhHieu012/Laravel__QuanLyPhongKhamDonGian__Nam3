<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\accounts;
use App\Models\appointment_schedules;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;

class CustomerController extends Controller
{
    // Các trang xử lý chung

    // GET: http://localhost/Project2Final/public/
    function viewHome() {
        return view('home');
    }

    // GET: http://localhost/Project2Final/public/register
    function viewRegister() {
        return view('user-layout/user-register');
    }

    // POST: http://localhost/Project2Final/public/register
    function register(RegisterRequest $request) {
        $validated = $request->validated();
        if ($validated) {
            $accounts = new accounts();
            // syntax: $tên_biến -> tên_cột_trên_bảng = $request -> name(giá trị thẻ name trong html)
            $accounts -> name = $request -> name;
            $accounts -> username = $request -> username;
            $accounts -> password = bcrypt($request -> password);
            // set quyền cho tk đăng kí là tài khoản khách hàng
            $accounts -> isCustomer = "1";
            $accounts->save();
            return redirect('/login')->with('success', 'Bạn đã đăng kí thành công!');
        }
    }

    // GET: http://localhost/Project2Final/public/login
    function viewLogin() {
        return view('user-layout/user-login');
    }

    // POST: http://localhost/Project2Final/public/login
    // Hàm xử lý đăng nhập (ko có giao diện)
    function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $result = Auth::attempt(['username' => $username, 'password' => $password]);
        if ($result == false) {
            return redirect()->back()->withErrors(['msg' => 'Tài khoản hoặc mật khẩu không đúng']);
        } else {
            $user = Auth::user();
            if ($user -> isAdmin == 1) {
                return redirect('/admin/home');
            }
            if ($user -> isDoctor == 1) {
                return redirect('/doctor/home');
            }
            elseif ($user -> isCustomer == 1) {
                return redirect('/');
            }
        }
    }

    // POST: http://localhost/Project2Final/public/logout
    function logout() {
        Auth::logout();
        return redirect('/');
    }

    // GET: http://localhost/Project2Final/public/introduce
    function viewIntroduce() {
        return view('/introduce');
    }

    // GET: http://localhost/Project2Final/public/datlich
    function viewDatLich() {
        $datlichs = appointment_schedules::all();
        return view('/datlich', ['datlichs' => $datlichs]);
    }

    // GET: http://localhost/Project2Final/public/datlich
    // Xử lý việc đặt lịch của khách hàng
    function datlich(Request $request) {

        // Kiểm tra ngày, thời gian đã đc chọn hay chưa
        $selectedTime = appointment_schedules::where('dates', $request->date)
            ->where('times', $request->time)
            ->first();
        if ($selectedTime) {
            // Nếu ng dùng chọn ngày, giờ đã tồn tại -> hiện tbao lỗi
            return redirect()->back()->with('errorDatLich', 'Thời gian bạn đặt lịch đã bị trùng! Vui lòng chọn ngày hoặc mốc thời gian khác');
        }

        $appointment_schedules = new Appointment_schedules;
        $appointment_schedules->names = $request->name;
        $appointment_schedules->phones = $request->phone;
        $appointment_schedules->dates = $request->date;
        $appointment_schedules->times = $request->time;
        $appointment_schedules->prices = $request->price;
        $appointment_schedules->accounts_id = $request->id=67;
        $appointment_schedules->save();
        return redirect('/datlich')->with('done', 'Bạn đã đặt lịch thành công!');
    }

    // GET: http://localhost/Project2Final/lichhen/edit/{id}
    // Trang giao diện lịch hẹn
    function editLich(Request $request, $id)
    {
        /*
        // Get the current time
        $currentTime = Carbon::now();

        // Retrieve the id information from the database
        $info = appointment_schedules::where('id', $id)->first();

        // Check if the elapsed time is less than 5 minutes
        if ($currentTime->diffInMinutes($info->created_at) > 5) {
            // Elapsed time is greater than 5 minutes, display an error message
            return redirect()->back()->with('form_expired', 'Đã quá 5 phút không thể xóa hay chỉnh sửa lịch hẹn! Liên hệ qua FB để được hỗ trợ');
        }
        */

        $datlich = appointment_schedules::where('id', '=', $id)->first();
        return view('/datlich-edit', compact('datlich'));
    }

    // GET: http://localhost/Project2Final/lichhen/edit/{id}
    // Trang update thông tin đặt lịch (ko giao diện)
    function updateLich(Request $request, $id)
    {
        $appointment_schedule = appointment_schedules::findOrFail($id);
        $appointment_schedule->names = $request->name;
        $appointment_schedule->phones = $request->phone;
        $appointment_schedule->dates = $request->date;
        $appointment_schedule->times = $request->time;
        $appointment_schedule->prices = $request->price;
        $appointment_schedule->save();
        return redirect('/datlich')->with('editDone', 'Sửa thông tin lịch hẹn thành công!');
    }

    // GET: http://localhost/Project2Final/datlich/delete/{id}
    // Trang hủy lịch hẹn
    function deleteLich(Request $request, $id)
    {
        //dd($request->get('idLichHen'));
        // Lấy time hiện tại
        $currentTime = Carbon::now();

        $info = appointment_schedules::where('id', $id)->first();

        // Check thời gian đã qua 5 phút hay chưa
        if ($currentTime->diffInMinutes($info->created_at) > 5) {
            // Nếu tgian (created_at) > 5p trả về thông báo
            return redirect()->back()->with('form_expired', 'Đã quá 5 phút không thể hủy lịch hẹn! Liên hệ qua FB để được hỗ trợ');
        } else {
            $info->delete();
            return redirect()->back()->with('deleteDone', 'Bạn đã hủy lịch hẹn thành công thành công!');
        }
    }

    // GET: http://localhost/Project2Final/public/lienhe
    function viewLienHe() {
        return view('/lienhe');
    }
}
