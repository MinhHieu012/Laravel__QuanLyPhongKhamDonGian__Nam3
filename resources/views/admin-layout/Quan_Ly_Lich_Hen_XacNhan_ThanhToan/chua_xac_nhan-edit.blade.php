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
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="time" id="time">
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
                <label for="exampleInputPassword1" class="form-label">Gói khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 1400px; height: 40px; border-radius: 3px" name="price" id="price">
                    <optgroup label="Khám lâm sàng">
                        <option value="Đo Mạch, Huyết Áp, Chỉ số BMI (Nam/Nữ): 50.000đ">Đo Mạch, Huyết Áp, Chỉ số BMI (Nam/Nữ): 50.000đ</option>
                        <option value="Khám tổng quát (Nam/Nữ/Trẻ em): 500.000đ">Khám tổng quát (Nam/Nữ/Trẻ em): 500.000đ</option>
                        <option value="Khám Mắt (Nam/Nữ/Trẻ em): 300.000đ">Khám Mắt (Nam/Nữ/Trẻ em): 300.000đ</option>
                        <option value="Khám Tai Mũi Họng (Nam/Nữ/Trẻ em): 150.000đ">Khám Tai Mũi Họng (Nam/Nữ/Trẻ em): 150.000đ</option>
                        <option value="Khám Răng (Nam/Nữ/Trẻ em): 350.000đ">Khám Răng (Nam/Nữ/Trẻ em): 350.000đ</option>
                    </optgroup>
                    <optgroup label="Xét nghiệm máu">
                        <option value="Xét nghiệm máu toàn phần (CBC): 200.000đ">Xét nghiệm máu toàn phần (CBC): 250.000đ</option>
                        <option value="Xét nghiệm Sinh Hóa Máu (Serum Biochemistry: 200.000đ)">Xét nghiệm Sinh Hóa Máu (SB): 200.000đ</option>
                    </optgroup>
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
                    <optgroup label="Phòng khám lâm sàng">
                        <option value="Phòng LS01">Phòng LS01</option>
                        <option value="Phòng LS02">Phòng LS02</option>
                        <option value="Phòng LS03">Phòng LS03</option>
                        <option value="Phòng LS04">Phòng LS04</option>
                        <option value="Phòng LS05">Phòng LS05</option>
                        <option value="Phòng LS06">Phòng LS06</option>
                        <option value="Phòng LS07">Phòng LS07</option>
                        <option value="Phòng LS08">Phòng LS08</option>
                    </optgroup>
                    <optgroup label="Phòng khám xét nghiệm">
                        <option value="Phòng XN01">Phòng XN01</option>
                        <option value="Phòng XN02">Phòng XN02</option>
                        <option value="Phòng XN03">Phòng XN03</option>
                        <option value="Phòng XN04">Phòng XN04</option>
                        <option value="Phòng XN05">Phòng XN05</option>
                    </optgroup>
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
