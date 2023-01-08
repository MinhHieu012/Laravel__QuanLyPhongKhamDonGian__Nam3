<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lịch hẹn</title>

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
        <h2 style="position: relative; right: -270px; top: 15px">Thêm lịch hẹn</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/lichhenchuaxacnhan')}}';">Quay lại
        </button>

        <form method="POST" class="a3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                     required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone"
                        required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày hẹn</label>
                <input type="date" class="form-control" id="date" name="date"
                       required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Thời gian hẹn</label>
                <input type="text" class="form-control" id="time" name="time"
                       placeholder="Nhập thời gian hẹn" required>
                {{--<select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="time" id="time">
                    @foreach($grouped_packages_times as $type => $times)
                        <optgroup label="{{ $type }}">
                            @foreach($times as $time)
                                <option value="{{ $time->times }}">{{ $time->times }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>--}}

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gói khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="price" id="price">
                    @foreach ($grouped_packages as $type => $packages)
                        <optgroup label="{{ $type }}">
                            @foreach ($packages as $package)
                                <option value="{{ $package->names }}">{{ $package->names }} - Giá: {{ $package->prices }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Bác sĩ khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" id="doctor_examine" name="doctor_examine">
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }} - {{ $doctor->name }}">ID: {{ $doctor->id }} - Họ tên: {{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phòng khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="room" id="room">
                    @foreach ($grouped_packages_rooms as $type => $rooms)
                        <optgroup label="{{ $type }}">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->rooms }}">{{ $room->rooms }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-warning" id="edit" name="edit">Thêm</button>
        </form>
    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@endsection
</html>
