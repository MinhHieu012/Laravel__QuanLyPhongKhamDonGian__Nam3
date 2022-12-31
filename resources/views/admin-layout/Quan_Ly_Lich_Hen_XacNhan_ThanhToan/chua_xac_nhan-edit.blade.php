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
@extends('admin-layout.menu.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Sửa lịch hẹn</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/lichhenchuaxacnhan')}}';">Quay lại
        </button>

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
                <select
                    style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px"
                    name="time" id="time">
                    <optgroup label="Sáng">
                        <option value="Sáng 8:00 giờ - 9:00 giờ">Sáng 08:00 giờ đến 09:00 giờ</option>
                        <option value="Sáng 9:00 giờ đến 10:00 giờ">Sáng 09:00 giờ đến 10:00 giờ</option>
                        <option value="Sáng 10:00 giờ đến 11:00 giờ">Sáng 10:00 giờ đến 11:00 giờ</option>
                    </optgroup>
                    <optgroup label="Chiều">
                        <option value="Chiều 01:00 giờ đến 02:00 giờ">Chiều 01:00 giờ đến 02:00 giờ</option>
                        <option value="Chiều 02:00 giờ đến 03:00 giờ">Chiều 02:00 giờ đến 03:00 giờ</option>
                        <option value="Chiều 03:00 giờ đến 04:00 giờ">Chiều 03:00 giờ đến 04:00 giờ</option>
                        <option value="Chiều 04:00 giờ đến 05:00 giờ">Chiều 04:00 giờ đến 05:00 giờ</option>
                        <option value="Chiều 05:00 giờ đến 06:00 giờ">Chiều 05:00 giờ đến 06:00 giờ</option>
                    </optgroup>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gói giá</label>
                <select
                    style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px"
                    name="price" id="price">
                    <option value="Gói 100.000đ">Gói 100.000đ</option>
                    <option value="Gói 200.000đ">Gói 200.000đ</option>
                    <option value="Gói 250.000đ">Gói 250.000đ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning" id="edit" name="edit">Sửa</button>
        </form>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</html>
