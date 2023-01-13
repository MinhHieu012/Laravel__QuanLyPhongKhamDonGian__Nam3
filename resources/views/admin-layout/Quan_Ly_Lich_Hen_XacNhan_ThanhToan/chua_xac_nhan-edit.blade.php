<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lịch hẹn</title>

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>

</head>

<style>
    .a3 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    .a3 {
        position: relative;
        top: 60px;
        left: 270px;
        width: 1400px;
    }
</style>

<body>
@extends('admin-layout.menu.AdminMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Xác nhận lịch hẹn</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/lichhenchuaxacnhan')}}';">Quay lại
        </button>

        @if (session('errorSuaLich'))
            <script>
                window.onload = function () {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('errorSuaLich') }}",
                        textColor: 'black',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

        <form method="POST" class="a3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                       value="{{$appointment_schedule->names}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone"
                       value="{{$appointment_schedule->phones}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày hẹn</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$appointment_schedule->dates}}"
                       required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Thời gian hẹn</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="time" id="time">
                    @foreach($grouped_packages_times as $type => $times)
                        <optgroup label="{{ $type }}">
                            @foreach($times as $time)
                                <option value="{{ $time->id }}">{{ $time->times }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gói khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="price" id="price">
                    @foreach ($grouped_packages as $type => $packages)
                        <optgroup label="{{ $type }}">
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->names }} - Giá: {{ $package->prices }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Bác sĩ khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" id="doctor_examine" name="doctor_examine">
                    @foreach ($grouped_packages_doctor as $type => $doctors)
                        <optgroup label="{{ $type }}">
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phòng khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="room" id="room">
                    @foreach ($grouped_packages_rooms as $type => $rooms)
                        <optgroup label="{{ $type }}">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->rooms }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-warning" id="edit" name="edit">Xác nhận</button>
        </form>
    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
</html>
