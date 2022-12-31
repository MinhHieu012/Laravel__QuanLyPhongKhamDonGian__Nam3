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
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
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
    function register(Request $request) {
        /*$validated = $request->validated();
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
        }*/

        $this->validate($request, [
            'username' => 'required|min:4|max:30|unique:accounts',
            'password' => ['required', Password::min(10)->letters()->mixedCase()->symbols()],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $accounts = new accounts();
        // syntax: $tên_biến -> tên_cột_trên_bảng = $request -> name(giá trị thẻ name trong html)
        $accounts -> name = $request -> name;
        $accounts -> phones = $request -> phone;
        $accounts -> username = $request -> username;
        $accounts -> password = bcrypt($request -> password);
        // set quyền cho tk đăng kí là tài khoản khách hàng
        $accounts -> isCustomer = "1";
        $accounts->save();
        return redirect('/login')->with('success', 'Bạn đã đăng kí thành công!');
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
            return redirect()->back()->with(['error' => 'Tài khoản hoặc mật khẩu không đúng']);
        } else {
            $user = Auth::user();
            if ($user -> isAdmin == 1) {
                return redirect('/admin/home')->with('success', 'Đăng nhập thành công!');
            }
            if ($user -> isDoctor == 1) {
                return redirect('/doctor/home')->with('success', 'Đăng nhập thành công!');
            }
            elseif ($user -> isCustomer == 1) {
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }
        }
    }

    // POST: http://localhost/Project2Final/public/logout
    function logout() {
        Auth::logout();
        return redirect('/')->with('successLogout', 'Đăng xuất thành công!');
    }

    function viewDoiMatKhau() {
        return view('user-layout/doimatkhau');
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
        return redirect('/user/changepassword')->with("success", "Mật khẩu đã được đổi thành công");
    }

    // GET: http://localhost/Project2Final/public/introduce
    function viewIntroduce() {
        return view('/introduce');
    }

    // GET: http://localhost/Project2Final/public/datlich
    function viewDatLich() {
        if (Auth::check()) {
            $datlichs = appointment_schedules::where('accounts_id', Auth::id())->get();
            return view('/datlich', ['datlichs' => $datlichs]);
        } else {
            return redirect('/login')->with('checkLogin', 'Vui lòng đăng nhập để đặt lịch!');
        }
    }

    // Xử lý việc đặt lịch của khách hàng
    function datlich(Request $request) {

        // Kiểm tra ngày, thời gian đã đc chọn hay chưa
        $selectedTime = appointment_schedules::where('dates', $request->date)
            ->where('times', $request->time)
            ->first();

        $count = appointment_schedules::where('dates', $request->date)
            ->where('times', $request->time)
            ->count();
        // Nếu lịch hẹn có ngày và tgian trùng nhau quá 5 lần hiện tbao
        if ($selectedTime && $count > 4) {
            return redirect()->back()->with('errorDatLich', 'Thời gian bạn đặt lịch đã quá nhiều người đặt! Vui lòng chọn ngày hoặc mốc thời gian khác');
        }

        if (Auth::check()) {
            $appointment_schedules = new Appointment_schedules;
            $appointment_schedules->accounts_id = Auth::id();
            $appointment_schedules->names = $request->name;
            $appointment_schedules->phones = $request->phone;
            $appointment_schedules->dates = $request->date;
            $appointment_schedules->times = $request->time;
            $appointment_schedules->prices = $request->price;
            $appointment_schedules->payment_status = $request->payment_status=0;
            $appointment_schedules->appointment_status = $request->appointment_status=3;
            $appointment_schedules->status = $request->status=0;
            $appointment_schedules->save();
            return redirect('/datlich')->with('done', 'Bạn đã đặt lịch thành công!');
        }
    }

    // GET: http://localhost/Project2Final/lichhen/edit/{id}
    // Trang giao diện lịch hẹn
    function editLich(Request $request, $id)
    {
        $info = appointment_schedules::where('status', '=', '1')->first();

        if ($info) {
            return redirect()->back()->with('form_expired', 'Lịch hẹn đã xác nhận không thể hủy hay chỉnh sửa! Liên hệ qua FB để được hỗ trợ');
        }
        else {
            $datlich = appointment_schedules::where('id', $id)->first();
            return view('/datlich-edit', compact('datlich'));
        }
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
        $info = appointment_schedules::where('status', '=', '1')->first();

        if ($info) {
            return redirect()->back()->with('form_expired', 'Lịch hẹn đã xác nhận không thể hủy hay chỉnh sửa! Liên hệ qua FB để được hỗ trợ');
        } else {
            $appointment_schedules = appointment_schedules::findOrFail($id);
            $appointment_schedules->delete();
            return redirect()->back()->with('deleteDone', 'Bạn đã hủy lịch hẹn thành công thành công!');
        }
    }

    // GET: http://localhost/Project2Final/public/lienhe
    function viewLienHe() {
        return view('/lienhe');
    }
}
