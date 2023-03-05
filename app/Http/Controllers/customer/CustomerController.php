<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\accounts;
use App\Models\appointment_schedules;
use App\Models\appointment_times;
use App\Models\health_checkup_packages;
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

    function viewHome() {
        return view('customer-layout/Homepage/home');
    }

    // GET: http://localhost/Project2Final/public/register
    function viewRegister() {
        return view('customer-layout/Login_and_Register/register');
    }

    // POST: http://localhost/Project2Final/public/register
    function register(Request $request) {

        $this->validate($request, [
            'username' => 'required|min:4|max:30|unique:accounts',
            'password' => ['required', Password::min(10)->letters()->mixedCase()->symbols()],
            'confirm_password' => ['required', 'same:password'],
        ]);

        // kiểm tra: rỗng -> id reset -> 1
        if(DB::table('accounts')->count() == 0) {
            DB::statement("ALTER TABLE accounts AUTO_INCREMENT = 1;");
        }

        $accounts = new accounts();
        // syntax: $tên_biến -> tên_cột_trên_bảng = $request -> name(giá trị thẻ name trong html)
        $accounts -> name = $request -> name;
        $accounts -> username = $request -> username;
        $accounts -> password = bcrypt($request -> password);
        // set quyền cho tk đăng kí là tài khoản khách hàng
        // levels: 1 -> Admin
        // levels: 2 -> Doctor
        // levels: 3 - > Khách
        // status = 0 -> Mở tk
        // status = 1 -> Khóa tk
        $accounts -> levels = "3";
        $accounts -> status = "0";
        $accounts->save();
        return redirect('/login')->with('success', 'Bạn đã đăng kí thành công!');
    }

    // GET: http://localhost/Project2Final/public/login
    function viewLogin() {
        return view('customer-layout/Login_and_Register/login');
    }

    // POST: http://localhost/Project2Final/public/login
    // Hàm xử lý đăng nhập (ko có giao diện)
    function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $account = accounts::where('username', $username)->first();
        if ($account && $account->status == 1) {
            $account->status = 1;
            $account->save();
            return redirect()->back()->with(['error' => 'Tài khoản đã bị khóa! Vui lòng liên hệ qua FB để được hỗ trợ']);
        }

        $result = Auth::attempt(['username' => $username, 'password' => $password]);

        if ($result == false) {
            return redirect()->back()->with(['error' => 'Tài khoản hoặc mật khẩu không đúng!']);
        }
        else {
            $user = Auth::user();
            // levels: 1 -> Admin
            // levels: 2 -> Doctor
            // levels: 3 - > Khách
            // status = 0 -> Mở tk
            // status = 1 -> Khóa tk
            if ($user -> levels == 1) {
                return redirect('/admin/home')->with('success', 'Đăng nhập thành công!');
            }
            if ($user -> levels == 2) {
                return redirect('/doctor/home')->with('success', 'Đăng nhập thành công!');
            }
            elseif ($user -> levels == 3) {
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
        return view('customer-layout/Change_Password/doimatkhau');
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
        $goikham = health_checkup_packages::all();
        return view('customer-layout/Gioi_thieu_page/introduce', ['goikham' => $goikham]);
    }

    // GET: http://localhost/Project2Final/public/datlich
    function viewDatLich() {

        // Gói các gói khám có cùng types và hiển thị trên select
        $health_checkup_packages = health_checkup_packages::all();
        $grouped_packages = $health_checkup_packages->groupBy('types');

        // Gói các mốc thời gian có cùng types (buổi) và hiển thị trên select
        $appointment_times = appointment_times::all();
        $grouped_packages_times = $appointment_times->groupBy('types');

        if (Auth::check()) {

            $appointments = appointment_schedules::with('appointment_times', 'health_checkup_packages', 'rooms')
                ->where('accounts_id', Auth::id())
                ->where('cancelled', '=', '0')
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
            return view('customer-layout/Dat_lich/datlich', ['appointments' => $appointmentsByDate], compact('grouped_packages', 'grouped_packages_times', 'appointment_times'));

            //return view('customer-layout/Dat_lich/datlich', ['datlichs' => $datlichs]);
        } else {
            return redirect('/login')->with('checkLogin', 'Vui lòng đăng nhập để đặt lịch!');
        }
    }

    // Xử lý việc đặt lịch của khách hàng
    function datlich(Request $request) {

        // kiểm tra: rỗng -> id reset -> 1
        if(DB::table('appointment_schedules')->count() == 0) {
            DB::statement("ALTER TABLE appointment_schedules AUTO_INCREMENT = 1;");
        }

        // Kiểm tra ngày, thời gian đã đc chọn quá 5 lần hay chưa
        $selectedTime = appointment_schedules::where('dates', $request->date)
            ->where('appointment_times_id', $request->appointment_times_id)
            ->first();

        $count = appointment_schedules::where('dates', $request->date)
            ->where('appointment_times_id', $request->appointment_times_id)
            ->count();

        // Nếu lịch hẹn có ngày và tgian trùng nhau quá 5 lần hiện tbao
        if ($selectedTime && $count > 4) {
            return redirect()->back()->with('errorDatLich', 'Thời gian bạn đặt lịch đã quá nhiều người đặt! Vui lòng chọn ngày hoặc mốc thời gian khác');
        }
        else {
                $appointment_schedules = new Appointment_schedules;
                $appointment_schedules->accounts_id = Auth::id();
                $appointment_schedules->names = $request->name;
                $appointment_schedules->phones = $request->phone;
                $appointment_schedules->dates = $request->date;

                // appointment_times_id
                //$appointment_schedules->times = $request->time;
                $appointment_schedules->appointment_times_id = $request->input('time');

                // health_checkup_packages_id
                //$appointment_schedules->prices = $request->price;
                $appointment_schedules->health_checkup_packages_id = $request->input('price');

                // rooms_id
                //$appointment_schedules->rooms_id = $request->input('rooms_id', 17);
                $appointment_schedules->rooms_id = 17;

                // appointment_status_id (trạng thái khám)
                $appointment_schedules->appointment_status_id = $request->input('appointment_status_id', 1);

                // payment_status_id
                $appointment_schedules->payment_status_id = $request->input('payment_status_id', 1);

                $appointment_schedules->status = $request->status = 0;

                // cancelled = 0 -> trạng thái thường
                // cancelled = 1 -> trạng thái hủy (nhưng ko xóa)
                $appointment_schedules->cancelled = 0;

                $appointment_schedules->save();
                return redirect('/datlich')->with('done', 'Bạn đã đặt lịch thành công!');
            }
        }

    // Trang chi tiết lịch hẹn
    function viewChiTietDatLich(Request $request, $id) {
        $lichhen = appointment_schedules::where('id', $id)->first();
        return view('customer-layout/Dat_lich/chitiet', compact('lichhen'));
    }

    // GET: http://localhost/Project2Final/lichhen/edit/{id}
    // Trang giao diện lịch hẹn
    function editLich(Request $request, $id)
    {
        // Gói các gói khám có cùng types và hiển thị trên select
        $health_checkup_packages = health_checkup_packages::all();
        $grouped_packages = $health_checkup_packages->groupBy('types');

        // Gói các mốc thời gian có cùng types (buổi) và hiển thị trên select
        $appointment_times = appointment_times::all();
        $grouped_packages_times = $appointment_times->groupBy('types');

        $info = appointment_schedules::where('id', $id)->first();

        if ($info->status == 1) {
            return redirect()->back()->with('form_expired', 'Lịch hẹn đã xác nhận không thể hủy hay chỉnh sửa! Liên hệ qua FB để được hỗ trợ');
        }
        else {
            $datlich = appointment_schedules::where('id', $id)->first();
            return view('customer-layout/Dat_lich/datlich-edit', compact('datlich', 'grouped_packages', 'grouped_packages_times'));
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

        //$appointment_schedule->times = $request->time;
        //$appointment_schedule->appointment_times_id = $request->input('time');
        $appointment_schedule->appointment_times_id = $request->input('time');

        //$appointment_schedule->prices = $request->price;
        $appointment_schedule->health_checkup_packages_id = $request->input('price');

        $appointment_schedule->save();
        return redirect('/datlich')->with('editDone', 'Sửa thông tin lịch hẹn thành công!');
    }

    // GET: http://localhost/Project2Final/datlich/delete/{id}
    // Trang hủy lịch hẹn
    function deleteLich(Request $request, $id)
    {
        //$info = appointment_schedules::where('status', '=','1')->first();

        $appointment = appointment_schedules::where('id', $id)->first();

        if ($appointment->status == 1) {
            return redirect()->back()->with('form_expired', 'Lịch hẹn đã xác nhận không thể hủy hay chỉnh sửa! Liên hệ qua FB để được hỗ trợ');
        }
        else {
            $appointment->cancelled = 1;
            $appointment->save();
            return redirect()->back()->with('deleteDone', 'Bạn đã hủy lịch hẹn thành công thành công!');
        }
    }

    // GET: http://localhost/Project2Final/public/lienhe
    function viewLienHe() {
        return view('customer-layout/Lienhe_page/lienhe');
    }
}
